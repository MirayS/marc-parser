<?php

declare(strict_types=1);

namespace MirayS\Marc\Bibliographic;

final class Link
{
    public function __construct(
        public readonly string $url,
        public readonly ?string $materialSpecified = null,
        public readonly ?string $electronicFormat = null,
        public readonly ?string $linkText = null,
        public readonly ?string $publicNote = null,
        public readonly ?string $relationship = null,
    ) {
    }
}
