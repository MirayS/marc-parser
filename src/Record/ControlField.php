<?php

declare(strict_types=1);

namespace MirayS\Marc\Record;

final class ControlField implements Field
{
    public function __construct(
        private readonly string $tag,
        private readonly string $value,
    ) {
    }

    public function getTag(): string
    {
        return $this->tag;
    }

    public function isControlField(): bool
    {
        return true;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function position(int $offset, int $length = 1): ?string
    {
        if ($offset < 0 || $length < 1 || strlen($this->value) < $offset + $length) {
            return null;
        }

        return substr($this->value, $offset, $length);
    }

    public function __toString(): string
    {
        return $this->tag . ' ' . str_replace(' ', '\\', $this->value);
    }
}
