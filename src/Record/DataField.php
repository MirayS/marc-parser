<?php

declare(strict_types=1);

namespace MirayS\Marc\Record;

final class DataField implements Field
{
    /** @var list<Subfield> */
    private array $subfields;

    /**
     * @param array<int, Subfield> $subfields
     */
    public function __construct(
        private readonly string $tag,
        private readonly string $indicator1 = ' ',
        private readonly string $indicator2 = ' ',
        array $subfields = [],
    ) {
        $this->subfields = array_values($subfields);
    }

    public function getTag(): string
    {
        return $this->tag;
    }

    public function isControlField(): bool
    {
        return false;
    }

    public function getIndicator1(): string
    {
        return $this->indicator1;
    }

    public function getIndicator2(): string
    {
        return $this->indicator2;
    }

    /** @return list<Subfield> */
    public function getSubfields(?string $codes = null): array
    {
        if ($codes === null || $codes === '') {
            return $this->subfields;
        }

        $wanted = str_split($codes);

        return array_values(array_filter(
            $this->subfields,
            static fn (Subfield $subfield): bool => in_array($subfield->getCode(), $wanted, true),
        ));
    }

    public function subfield(string $code): ?string
    {
        foreach ($this->subfields as $subfield) {
            if ($subfield->getCode() === $code) {
                return $subfield->getValue();
            }
        }

        return null;
    }

    /** @return list<string> */
    public function subfieldValues(string $codes): array
    {
        return array_map(
            static fn (Subfield $subfield): string => $subfield->getValue(),
            $this->getSubfields($codes),
        );
    }

    public function hasSubfield(string $code): bool
    {
        return $this->subfield($code) !== null;
    }

    public function concat(string $codes, string $glue = ' '): ?string
    {
        $values = $this->subfieldValues($codes);

        return $values === [] ? null : implode($glue, $values);
    }

    public function withSubfields(Subfield ...$subfields): self
    {
        return new self($this->tag, $this->indicator1, $this->indicator2, array_merge($this->subfields, $subfields));
    }

    public function __toString(): string
    {
        $indicators = str_replace(' ', '\\', $this->indicator1 . $this->indicator2);

        return $this->tag . ' ' . $indicators . ' ' . implode(' ', array_map('strval', $this->subfields));
    }
}
