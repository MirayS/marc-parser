<?php

declare(strict_types=1);

namespace MirayS\Marc\Record;

use MirayS\Marc\CodeList\FixedFields;

abstract class CodedField extends PositionalField
{
    abstract public function getRecordFormat(): RecordFormat;

    abstract protected function tag(): string;

    abstract protected function variant(): string;

    public function positions(): array
    {
        $positions = [];

        foreach ($this->definitions() as $name => $definition) {
            $positions[$name] = [$definition['offset'], $definition['length']];
        }

        return $positions;
    }

    /**
     * @return array<string, array{offset: int, length: int, label: string, values: array<string, string>}>
     */
    public function definitions(): array
    {
        return FixedFields::positions($this->getRecordFormat()->value, $this->tag(), $this->variant());
    }

    /**
     * @return array<string, string>
     */
    public function values(string $name): array
    {
        return $this->definitions()[$this->resolveName($name)]['values'] ?? [];
    }

    public function label(string $name): ?string
    {
        return $this->definitions()[$this->resolveName($name)]['label'] ?? null;
    }

    /**
     * @return array<string, string>
     */
    public function toLabelled(): array
    {
        $labelled = [];

        foreach (array_keys($this->definitions()) as $name) {
            $value = $this->get($name);

            if ($value === null) {
                continue;
            }

            $labelled[$name] = $this->describe($name) ?? $value;
        }

        return $labelled;
    }
}
