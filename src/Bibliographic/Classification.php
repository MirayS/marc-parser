<?php

declare(strict_types=1);

namespace MirayS\Marc\Bibliographic;

final class Classification
{
    public function __construct(
        public readonly string $code,
        public readonly string $tag,
        public readonly ?string $scheme = null,
        public readonly ?string $edition = null,
        public readonly ?string $label = null,
    ) {
    }
}
