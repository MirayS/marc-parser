<?php

declare(strict_types=1);

namespace MirayS\Marc\Reader;

use MirayS\Marc\Exception\MarcException;
use MirayS\Marc\Issue\Issue;
use MirayS\Marc\Issue\IssueCollector;
use ZipArchive;

abstract class AbstractReader
{
    protected IssueCollector $issues;

    protected int $recordCount = 0;

    /** @var list<Issue> */
    protected array $recordIssues = [];

    public function __construct(
        protected readonly bool $strict = false,
        int $issueLimit = 1000,
        protected readonly bool $normalize = true,
    ) {
        $this->issues = new IssueCollector($strict, $issueLimit);
    }

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

    protected function value(string $value): string
    {
        return $this->normalize ? \MirayS\Marc\Support\Text::normalize($value) : $value;
    }

    protected function resolveUri(string $source): string
    {
        if (preg_match('#^[a-z0-9.+-]+://#i', $source) === 1) {
            return $source;
        }

        if (!is_file($source) || !is_readable($source)) {
            throw new MarcException(sprintf('MARC file %s is not readable', $source));
        }

        $extension = strtolower(pathinfo($source, PATHINFO_EXTENSION));

        return match ($extension) {
            'gz', 'gzip' => 'compress.zlib://' . $source,
            'bz2' => 'compress.bzip2://' . $source,
            'zip' => 'zip://' . $source . '#' . $this->firstZipEntry($source),
            default => $source,
        };
    }

    private function firstZipEntry(string $source): string
    {
        if (!class_exists(ZipArchive::class)) {
            throw new MarcException('ext-zip is required to read zipped MARC files');
        }

        $zip = new ZipArchive();

        if ($zip->open($source) !== true) {
            throw new MarcException(sprintf('Cannot open zip archive %s', $source));
        }

        for ($i = 0; $i < $zip->numFiles; $i++) {
            $name = (string) $zip->getNameIndex($i);

            if (!str_ends_with($name, '/')) {
                $zip->close();

                return $name;
            }
        }

        $zip->close();

        throw new MarcException(sprintf('No entry found in %s', $source));
    }
}
