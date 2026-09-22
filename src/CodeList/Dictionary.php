<?php

declare(strict_types=1);

namespace MirayS\Marc\CodeList;

use MirayS\Marc\Record\RecordFormat;

final class Dictionary
{
    /**
     * @param array<int|string, mixed> $tags
     */
    private function __construct(
        private readonly array $tags,
        public readonly string $format,
        public readonly string $source,
    ) {
    }

    public static function for(RecordFormat $format): ?self
    {
        return match ($format) {
            RecordFormat::Bibliographic => new self(Fields::TAGS, Fields::FORMAT, Fields::SOURCE),
            RecordFormat::Authority => new self(AuthorityFields::TAGS, AuthorityFields::FORMAT, AuthorityFields::SOURCE),
            RecordFormat::Holdings => new self(HoldingsFields::TAGS, HoldingsFields::FORMAT, HoldingsFields::SOURCE),
            RecordFormat::Classification, RecordFormat::CommunityInformation => null,
        };
    }

    public function exists(string $tag): bool
    {
        return isset($this->tags[$tag]);
    }

    public function isLocal(string $tag): bool
    {
        return !$this->exists($tag) && str_contains($tag, '9');
    }

    public function isLocalSubfield(string $code): bool
    {
        return $code === '9';
    }

    public function acceptsAnySubfield(string $tag): bool
    {
        return $tag === '880' || $tag === '886';
    }

    public function label(string $tag): ?string
    {
        return $this->tags[$tag]['label'] ?? null;
    }

    public function isRepeatable(string $tag): ?bool
    {
        return $this->tags[$tag]['repeatable'] ?? null;
    }

    public function subfieldExists(string $tag, string $code): bool
    {
        return isset($this->tags[$tag]['subfields'][$code]);
    }

    public function subfieldLabel(string $tag, string $code): ?string
    {
        return $this->tags[$tag]['subfields'][$code]['label'] ?? null;
    }

    public function isSubfieldRepeatable(string $tag, string $code): ?bool
    {
        return $this->tags[$tag]['subfields'][$code]['repeatable'] ?? null;
    }

    /**
     * @return array<string, array{label: string, repeatable: bool}>
     */
    public function subfields(string $tag): array
    {
        return $this->tags[$tag]['subfields'] ?? [];
    }

    public function indicatorLabel(string $tag, int $position): ?string
    {
        return $this->tags[$tag]['indicators'][$position]['label'] ?? null;
    }

    /**
     * @return array<string, string>
     */
    public function indicatorValues(string $tag, int $position): array
    {
        return $this->tags[$tag]['indicators'][$position]['values'] ?? [];
    }

    public function indicatorIsDefined(string $tag, int $position, string $value): ?bool
    {
        $values = $this->indicatorValues($tag, $position);

        return $values === [] ? null : isset($values[$value]);
    }
}
