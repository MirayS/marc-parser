<?php

declare(strict_types=1);

namespace MirayS\Marc\Record;

final class Record
{
    /** @var list<Field> */
    private array $fields;

    private string $leader;

    /**
     * @param array<int, Field> $fields
     */
    public function __construct(string $leader = Leader::DEFAULT, array $fields = [])
    {
        $this->leader = str_pad(substr($leader, 0, Leader::LENGTH), Leader::LENGTH, ' ');
        $this->fields = array_values($fields);
    }

    public function getRawLeader(): string
    {
        return $this->leader;
    }

    public function getLeader(): Leader
    {
        return new Leader($this->leader);
    }

    public function withLeader(string $leader): self
    {
        return new self($leader, $this->fields);
    }

    public function add(Field ...$fields): self
    {
        foreach ($fields as $field) {
            $this->fields[] = $field;
        }

        return $this;
    }

    /** @return list<Field> */
    public function getFields(?string ...$tags): array
    {
        $tags = array_values(array_filter($tags, static fn (?string $tag): bool => $tag !== null && $tag !== ''));

        if ($tags === []) {
            return $this->fields;
        }

        return array_values(array_filter(
            $this->fields,
            static fn (Field $field): bool => in_array($field->getTag(), $tags, true),
        ));
    }

    /** @return list<DataField> */
    public function getDataFields(string ...$tags): array
    {
        $fields = $tags === [] ? $this->fields : $this->getFields(...$tags);

        return array_values(array_filter($fields, static fn (Field $field): bool => $field instanceof DataField));
    }

    /** @return list<ControlField> */
    public function getControlFields(string ...$tags): array
    {
        $fields = $tags === [] ? $this->fields : $this->getFields(...$tags);

        return array_values(array_filter($fields, static fn (Field $field): bool => $field instanceof ControlField));
    }

    public function getField(string $tag): ?Field
    {
        return $this->getFields($tag)[0] ?? null;
    }

    public function getDataField(string $tag): ?DataField
    {
        return $this->getDataFields($tag)[0] ?? null;
    }

    public function getControlValue(string $tag): ?string
    {
        return ($this->getControlFields($tag)[0] ?? null)?->getValue();
    }

    public function has(string $tag): bool
    {
        return $this->getFields($tag) !== [];
    }

    public function getId(): ?string
    {
        $value = $this->getControlValue('001');

        return $value === null || trim($value) === '' ? null : trim($value);
    }

    /**
     * @return list<string>
     */
    public function subfieldValues(string $tag, string $codes): array
    {
        $values = [];

        foreach ($this->getDataFields($tag) as $field) {
            foreach ($field->subfieldValues($codes) as $value) {
                $values[] = $value;
            }
        }

        return $values;
    }

    public function firstSubfield(string $tag, string $code): ?string
    {
        foreach ($this->getDataFields($tag) as $field) {
            $value = $field->subfield($code);

            if ($value !== null) {
                return $value;
            }
        }

        return null;
    }

    public function getFixedField008(): ?FixedField008
    {
        $value = $this->getControlValue('008');
        $leader = $this->getLeader();

        return $value === null
            ? null
            : new FixedField008($value, $leader->getMaterialType(), $leader->getRecordFormat());
    }

    /**
     * @return list<DataField>
     */
    public function getAlternateGraphics(DataField $field): array
    {
        if ($field->getTag() === '880') {
            return [];
        }

        $linkage = $field->getLinkage();

        if ($linkage === null || $linkage->isUnlinked()) {
            return [];
        }

        return array_values(array_filter(
            $this->getDataFields('880'),
            static function (DataField $candidate) use ($field, $linkage): bool {
                $candidateLinkage = $candidate->getLinkage();

                return $candidateLinkage !== null
                    && $candidateLinkage->pointsTo($field->getTag(), $linkage->occurrence);
            },
        ));
    }

    public function getLinkedField(DataField $field): ?DataField
    {
        $linkage = $field->getLinkage();

        if ($linkage === null || $linkage->isUnlinked()) {
            return null;
        }

        foreach ($this->getDataFields($linkage->tag) as $candidate) {
            $candidateLinkage = $candidate->getLinkage();

            if ($candidateLinkage !== null && $candidateLinkage->pointsTo($field->getTag(), $linkage->occurrence)) {
                return $candidate;
            }
        }

        return null;
    }

    /**
     * @return list<array{DataField, list<DataField>}>
     */
    public function getScriptPairs(): array
    {
        $pairs = [];

        foreach ($this->getDataFields() as $field) {
            if ($field->getTag() === '880') {
                continue;
            }

            $alternates = $this->getAlternateGraphics($field);

            if ($alternates !== []) {
                $pairs[] = [$field, $alternates];
            }
        }

        return $pairs;
    }

    /**
     * @return list<DataField>
     */
    public function getUnlinkedAlternateGraphics(): array
    {
        return array_values(array_filter(
            $this->getDataFields('880'),
            static fn (DataField $field): bool => $field->getLinkage()?->isUnlinked() ?? true,
        ));
    }

    /** @return list<FixedField007> */
    public function getFixedFields007(): array
    {
        return array_map(
            static fn (ControlField $field): FixedField007 => new FixedField007($field->getValue()),
            $this->getControlFields('007'),
        );
    }

    /** @return list<FixedField006> */
    public function getFixedFields006(): array
    {
        return array_map(
            static fn (ControlField $field): FixedField006 => new FixedField006($field->getValue()),
            $this->getControlFields('006'),
        );
    }

    public function __toString(): string
    {
        $lines = ['LDR ' . str_replace(' ', '\\', $this->leader)];

        foreach ($this->fields as $field) {
            $lines[] = (string) $field;
        }

        return implode("\n", $lines);
    }
}
