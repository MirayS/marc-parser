<?php

declare(strict_types=1);

namespace MirayS\Marc\Reader;

use Generator;
use JsonException;
use MirayS\Marc\Exception\MarcException;
use MirayS\Marc\Issue\Issue;
use MirayS\Marc\Record\ControlField;
use MirayS\Marc\Record\DataField;
use MirayS\Marc\Record\Leader;
use MirayS\Marc\Record\Record;
use MirayS\Marc\Record\Subfield;

final class MarcJsonReader extends AbstractReader
{
    /**
     * @return Generator<int, Record>
     */
    public function read(string $source): Generator
    {
        $uri = $this->resolveUri($source);
        $handle = @fopen($uri, 'rb');

        if ($handle === false) {
            throw new MarcException(sprintf('Cannot open MARC-in-JSON source %s', $source));
        }

        try {
            yield from $this->readStream($handle);
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

        while (($line = fgets($stream)) !== false) {
            $line = trim($line, " \t\r\n,");

            if ($line === '' || $line === '[' || $line === ']') {
                continue;
            }

            $record = $this->decode($line);

            if ($record !== null) {
                yield $record;
            }
        }
    }

    /**
     * @return Generator<int, Record>
     */
    public function readString(string $json): Generator
    {
        $trimmed = ltrim($json);

        if (str_starts_with($trimmed, '[')) {
            $decoded = $this->decodeJson($trimmed);

            if (!is_array($decoded)) {
                return;
            }

            foreach ($decoded as $item) {
                if (is_array($item)) {
                    yield $this->readArray($item);
                }
            }

            return;
        }

        foreach (preg_split('/\R/', $json) ?: [] as $line) {
            $line = trim($line, " \t\r\n,");

            if ($line === '') {
                continue;
            }

            $record = $this->decode($line);

            if ($record !== null) {
                yield $record;
            }
        }
    }

    /**
     * @param array<string, mixed> $data
     */
    public function readArray(array $data): Record
    {
        $leaderValue = is_string($data['leader'] ?? null) ? $data['leader'] : Leader::DEFAULT;
        $id = null;
        $fields = [];

        $rawFields = $data['fields'] ?? [];

        if (!is_array($rawFields)) {
            $rawFields = [];
        }

        foreach ($rawFields as $entry) {
            if (!is_array($entry)) {
                continue;
            }

            foreach ($entry as $tag => $content) {
                $tag = (string) $tag;

                if (is_string($content)) {
                    if ($tag === '001') {
                        $id = trim($content);
                    }

                    $fields[] = new ControlField($tag, $this->value($content));

                    continue;
                }

                if (!is_array($content)) {
                    continue;
                }

                $fields[] = $this->dataField($tag, $content);
            }
        }

        $offset = $this->startRecord($id);

        if (strlen($leaderValue) !== Leader::LENGTH) {
            $this->issues->add(
                Issue::INVALID_LEADER,
                'leader',
                sprintf('Leader is %d bytes long, expected %d', strlen($leaderValue), Leader::LENGTH),
            );
        }

        $this->finishRecord($offset);

        return new Record($leaderValue, $fields);
    }

    /**
     * @param array<string, mixed> $content
     */
    private function dataField(string $tag, array $content): DataField
    {
        $subfields = [];
        $rawSubfields = $content['subfields'] ?? [];

        if (is_array($rawSubfields)) {
            foreach ($rawSubfields as $subfield) {
                if (!is_array($subfield)) {
                    continue;
                }

                foreach ($subfield as $code => $value) {
                    if (!is_string($value)) {
                        continue;
                    }

                    $value = $this->value($value);

                    if ($value === '') {
                        $this->issues->add(Issue::EMPTY_SUBFIELD, $tag . '$' . $code, 'Subfield is empty');
                    }

                    $subfields[] = new Subfield((string) $code, $value);
                }
            }
        }

        return new DataField(
            $tag,
            is_string($content['ind1'] ?? null) && $content['ind1'] !== '' ? $content['ind1'] : ' ',
            is_string($content['ind2'] ?? null) && $content['ind2'] !== '' ? $content['ind2'] : ' ',
            $subfields,
        );
    }

    private function decode(string $line): ?Record
    {
        $decoded = $this->decodeJson($line);

        if (!is_array($decoded)) {
            return null;
        }

        return $this->readArray($decoded);
    }

    /**
     * @return mixed
     */
    private function decodeJson(string $json)
    {
        try {
            return json_decode($json, true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $exception) {
            if ($this->strict) {
                throw new MarcException($exception->getMessage(), 0, $exception);
            }

            $this->issues->add(Issue::JSON_ERROR, 'json', $exception->getMessage());

            return null;
        }
    }
}
