<?php

declare(strict_types=1);

namespace MirayS\Marc\Reader;

use Generator;
use MirayS\Marc\Encoding\Encoding;
use MirayS\Marc\Exception\MarcException;
use MirayS\Marc\Issue\Issue;
use MirayS\Marc\Record\ControlField;
use MirayS\Marc\Record\DataField;
use MirayS\Marc\Record\Leader;
use MirayS\Marc\Record\Record;
use MirayS\Marc\Record\Subfield;

final class Iso2709Reader extends AbstractReader
{
    public const RECORD_TERMINATOR = "\x1D";
    public const FIELD_TERMINATOR = "\x1E";
    public const SUBFIELD_DELIMITER = "\x1F";

    private const DIRECTORY_ENTRY_LENGTH = 12;
    private const CHUNK_SIZE = 65536;

    private ?string $recordRaw = null;

    public function __construct(
        bool $strict = false,
        int $issueLimit = 1000,
        bool $normalize = true,
        private readonly bool $captureRaw = false,
        Encoding $encoding = Encoding::Auto,
    ) {
        parent::__construct($strict, $issueLimit, $normalize, $encoding);
    }

    /**
     * @return Generator<int, Record>
     */
    public function read(string $source): Generator
    {
        $uri = $this->resolveUri($source);
        $handle = @fopen($uri, 'rb');

        if ($handle === false) {
            throw new MarcException(sprintf('Cannot open MARC source %s', $source));
        }

        try {
            yield from $this->iterate($handle);
        } finally {
            fclose($handle);
        }
    }

    /**
     * @param resource $stream
     *
     * @return Generator<int, Record>
     */
    public function readStream($stream): Generator
    {
        if (!is_resource($stream)) {
            throw new MarcException('readStream() expects a stream resource');
        }

        yield from $this->iterate($stream);
    }

    /**
     * @return Generator<int, Record>
     */
    public function readString(string $data): Generator
    {
        $offset = 0;
        $length = strlen($data);

        while ($offset < $length) {
            $end = strpos($data, self::RECORD_TERMINATOR, $offset);

            if ($end === false) {
                $raw = substr($data, $offset);
                $offset = $length;
            } else {
                $raw = substr($data, $offset, $end - $offset);
                $offset = $end + 1;
            }

            if (trim($raw, " \r\n") === '') {
                continue;
            }

            yield $this->parse($raw);
        }
    }

    public function parseRecord(string $raw): Record
    {
        return $this->parse(rtrim($raw, self::RECORD_TERMINATOR));
    }

    public function getRecordRaw(): ?string
    {
        return $this->recordRaw;
    }

    /**
     * @param resource $stream
     *
     * @return Generator<int, Record>
     */
    private function iterate($stream): Generator
    {
        $buffer = '';

        while (!feof($stream)) {
            $chunk = fread($stream, self::CHUNK_SIZE);

            if ($chunk === false || $chunk === '') {
                break;
            }

            $buffer .= $chunk;

            while (($position = strpos($buffer, self::RECORD_TERMINATOR)) !== false) {
                $raw = substr($buffer, 0, $position);
                $buffer = substr($buffer, $position + 1);

                if (trim($raw, " \r\n") === '') {
                    continue;
                }

                yield $this->parse($raw);
            }
        }

        if (trim($buffer, " \r\n") !== '') {
            yield $this->parse($buffer);
        }
    }

    private function parse(string $raw): Record
    {
        $this->recordRaw = $this->captureRaw ? $raw . self::RECORD_TERMINATOR : null;

        $leader = substr($raw, 0, Leader::LENGTH);
        $id = $this->identifier($raw, $leader);
        $offset = $this->startRecord($id);

        if (strlen($leader) < Leader::LENGTH) {
            $this->issues->add(Issue::INVALID_LEADER, 'leader', 'Record shorter than the 24 byte leader');
            $this->finishRecord($offset);

            return new Record(str_pad($leader, Leader::LENGTH, ' '));
        }

        $this->useMarc8($leader);

        $fields = [];

        foreach ($this->directory($raw, $leader) as [$tag, $start, $length]) {
            $baseAddress = (int) substr($leader, 12, 5);
            $data = substr($raw, $baseAddress + $start, $length);
            $data = rtrim($data, self::FIELD_TERMINATOR);

            if ($tag < '010' || !str_contains($data, self::SUBFIELD_DELIMITER)) {
                $fields[] = new ControlField($tag, $this->value($data));

                continue;
            }

            $fields[] = $this->parseDataField($tag, $data);
        }

        $this->finishRecord($offset);

        return new Record($leader, $fields);
    }

    /**
     * @return list<array{string, int, int}>
     */
    private function directory(string $raw, string $leader): array
    {
        $baseAddress = (int) substr($leader, 12, 5);
        $end = strpos($raw, self::FIELD_TERMINATOR);
        $directoryEnd = $end === false ? $baseAddress - 1 : $end;

        if ($directoryEnd <= Leader::LENGTH) {
            $this->issues->add(Issue::INVALID_DIRECTORY, 'directory', 'Directory is missing');

            return [];
        }

        $directory = substr($raw, Leader::LENGTH, $directoryEnd - Leader::LENGTH);

        if (strlen($directory) % self::DIRECTORY_ENTRY_LENGTH !== 0) {
            $this->issues->add(
                Issue::INVALID_DIRECTORY,
                'directory',
                sprintf('Directory length %d is not a multiple of 12', strlen($directory)),
            );
        }

        $entries = [];
        $count = intdiv(strlen($directory), self::DIRECTORY_ENTRY_LENGTH);

        for ($i = 0; $i < $count; $i++) {
            $entry = substr($directory, $i * self::DIRECTORY_ENTRY_LENGTH, self::DIRECTORY_ENTRY_LENGTH);
            $tag = substr($entry, 0, 3);
            $length = substr($entry, 3, 4);
            $start = substr($entry, 7, 5);

            if (preg_match('/^\d{4}$/', $length) !== 1 || preg_match('/^\d{5}$/', $start) !== 1) {
                $this->issues->add(Issue::INVALID_DIRECTORY, $tag, 'Directory entry is not numeric');

                continue;
            }

            $entries[] = [$tag, (int) $start, (int) $length];
        }

        return $entries;
    }

    private function parseDataField(string $tag, string $data): DataField
    {
        $indicator1 = substr($data, 0, 1);
        $indicator2 = substr($data, 1, 1);
        $parts = explode(self::SUBFIELD_DELIMITER, substr($data, 2));
        $subfields = [];

        foreach ($parts as $part) {
            if ($part === '') {
                continue;
            }

            $code = substr($part, 0, 1);
            $value = $this->value(substr($part, 1));

            if ($value === '') {
                $this->issues->add(Issue::EMPTY_SUBFIELD, $tag . '$' . $code, 'Subfield is empty');
            }

            $subfields[] = new Subfield($code, $value);
        }

        return new DataField(
            $tag,
            $indicator1 === '' ? ' ' : $indicator1,
            $indicator2 === '' ? ' ' : $indicator2,
            $subfields,
        );
    }

    private function identifier(string $raw, string $leader): ?string
    {
        $baseAddress = (int) substr($leader, 12, 5);

        foreach ($this->silentDirectory($raw, $leader) as [$tag, $start, $length]) {
            if ($tag === '001') {
                return trim(rtrim(substr($raw, $baseAddress + $start, $length), self::FIELD_TERMINATOR));
            }
        }

        return null;
    }

    /**
     * @return list<array{string, int, int}>
     */
    private function silentDirectory(string $raw, string $leader): array
    {
        $end = strpos($raw, self::FIELD_TERMINATOR);

        if ($end === false || $end <= Leader::LENGTH) {
            return [];
        }

        $directory = substr($raw, Leader::LENGTH, $end - Leader::LENGTH);
        $entries = [];
        $count = intdiv(strlen($directory), self::DIRECTORY_ENTRY_LENGTH);

        for ($i = 0; $i < $count; $i++) {
            $entry = substr($directory, $i * self::DIRECTORY_ENTRY_LENGTH, self::DIRECTORY_ENTRY_LENGTH);

            if (preg_match('/^\d{4}$/', substr($entry, 3, 4)) !== 1
                || preg_match('/^\d{5}$/', substr($entry, 7, 5)) !== 1
            ) {
                continue;
            }

            $entries[] = [substr($entry, 0, 3), (int) substr($entry, 7, 5), (int) substr($entry, 3, 4)];
        }

        return $entries;
    }
}
