<?php

declare(strict_types=1);

namespace MirayS\Marc\Bibliographic;

final class Subject
{
    /**
     * @param list<string> $subdivisions
     */
    public function __construct(
        public readonly string $heading,
        public readonly string $tag,
        public readonly array $subdivisions = [],
        public readonly ?string $thesaurus = null,
    ) {
    }

    public function __toString(): string
    {
        return $this->subdivisions === []
            ? $this->heading
            : $this->heading . ' -- ' . implode(' -- ', $this->subdivisions);
    }
}
