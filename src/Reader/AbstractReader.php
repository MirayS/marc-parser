<?php

declare(strict_types=1);

namespace MirayS\Marc\Reader;

use Generator;
use MirayS\Marc\Encoding\Encoding;
use MirayS\Marc\Encoding\Marc8Decoder;
use MirayS\Marc\Issue\Issue;
use MirayS\Marc\Issue\IssueCollector;

abstract class AbstractReader
{
    protected IssueCollector $issues;

    protected int $recordCount = 0;

    /** @var list<Issue> */
    protected array $recordIssues = [];

    protected Encoding $encoding = Encoding::Auto;

    private ?Marc8Decoder $decoder = null;

    private bool $marc8 = false;

    public function __construct(
        protected readonly bool $strict = false,
        int $issueLimit = 1000,
        protected readonly bool $normalize = true,
        Encoding $encoding = Encoding::Auto,
    ) {
        $this->issues = new IssueCollector($strict, $issueLimit);
        $this->encoding = $encoding;
    }

    /**
     * @return Generator<int, \MirayS\Marc\Record\Record>
     */
    abstract public function read(string $source): Generator;

    /**
     * @return Generator<int, \MirayS\Marc\Record\Record>
     */
    abstract public function readString(string $data): Generator;

    /**
     * @param resource $stream
     *
     * @return Generator<int, \MirayS\Marc\Record\Record>
     */
    abstract public function readStream($stream): Generator;

    public function getRecordCount(): int
    {
        return $this->recordCount;
    }

    /** @return list<Issue> */
    public function getIssues(): array
    {
        return $this->issues->all();
    }

    /** @return list<Issue> */
    public function getRecordIssues(): array
    {
        return $this->recordIssues;
    }

    protected function startRecord(?string $id): int
    {
        $this->issues->setRecordId($id);

        return $this->issues->count();
    }

    protected function finishRecord(int $offset): void
    {
        $this->issues->setRecordId(null);
        $this->recordIssues = array_slice($this->issues->all(), $offset);
        $this->recordCount++;
    }

    protected function useMarc8(string $leader): void
    {
        $this->marc8 = match ($this->encoding) {
            Encoding::Marc8 => true,
            Encoding::Utf8 => false,
            Encoding::Auto => (strlen($leader) > 9 ? $leader[9] : 'a') !== 'a',
        };
    }

    protected function value(string $value): string
    {
        if ($this->marc8 && ($value !== '') && (str_contains($value, "\x1b") || !Marc8Decoder::looksLikeUtf8($value))) {
            $this->decoder ??= new Marc8Decoder();
            $decoded = $this->decoder->decode($value);

            foreach ($this->decoder->getUnmapped() as $unmapped) {
                $this->issues->add(Issue::ENCODING, 'marc-8', $unmapped);
            }

            return $decoded;
        }

        return $this->normalize ? \MirayS\Marc\Support\Text::normalize($value) : $value;
    }

    protected function resolveUri(string $source): string
    {
        return SourceUri::resolve($source);
    }
}
