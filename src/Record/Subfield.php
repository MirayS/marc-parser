<?php

declare(strict_types=1);

namespace MirayS\Marc\Record;

final class Subfield
{
    public function __construct(
        private readonly string $code,
        private readonly string $value,
    ) {
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return '$' . $this->code . $this->value;
    }
}
