<?php

declare(strict_types=1);

namespace MirayS\Marc\Issue;

use MirayS\Marc\Exception\MarcException;

final class IssueCollector
{
    /** @var list<Issue> */
    private array $issues = [];

    private ?string $recordId = null;

    public function __construct(
        private readonly bool $strict = false,
        private readonly int $limit = 1000,
    ) {
    }

    public function setRecordId(?string $recordId): void
    {
        $this->recordId = $recordId;
    }

    public function add(string $type, string $path, string $message): void
    {
        $issue = new Issue($type, $path, $message, $this->recordId);

        if ($this->strict) {
            throw new MarcException((string) $issue);
        }

        if (count($this->issues) < $this->limit) {
            $this->issues[] = $issue;
        }
    }

    /** @return list<Issue> */
    public function all(): array
    {
        return $this->issues;
    }

    public function count(): int
    {
        return count($this->issues);
    }

    public function clear(): void
    {
        $this->issues = [];
    }
}
