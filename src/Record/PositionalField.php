<?php

declare(strict_types=1);

namespace MirayS\Marc\Record;

abstract class PositionalField
{
    public function __construct(protected readonly string $value)
    {
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function at(int $offset, int $length = 1): ?string
    {
        if ($offset < 0 || $length < 1 || strlen($this->value) < $offset + $length) {
            return null;
        }

        return substr($this->value, $offset, $length);
    }

    public function get(string $name): ?string
    {
        $positions = $this->positions();
        $name = isset($positions[$name]) ? $name : $this->resolveName($name);

        if (!isset($positions[$name])) {
            return null;
        }

        [$offset, $length] = $positions[$name];

        return $this->at($offset, $length);
    }

    /**
     * @return array<string, string>
     */
    public function aliases(): array
    {
        return [];
    }

    public function resolveName(string $name): string
    {
        return $this->aliases()[$name] ?? $name;
    }

    /**
     * @return array<string, string>
     */
    public function values(string $name): array
    {
        return [];
    }

    public function describe(string $name): ?string
    {
        $value = $this->get($name);

        return $value === null ? null : ($this->values($name)[$value] ?? null);
    }

    public function label(string $name): ?string
    {
        return null;
    }

    /**
     * @return array<string, string>
     */
    public function toArray(): array
    {
        $values = [];

        foreach (array_keys($this->positions()) as $name) {
            $value = $this->get($name);

            if ($value !== null) {
                $values[$name] = $value;
            }
        }

        return $values;
    }

    /**
     * @return array<string, array{int, int}>
     */
    abstract public function positions(): array;

    public function __toString(): string
    {
        return $this->value;
    }
}
