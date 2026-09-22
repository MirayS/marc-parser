<?php

declare(strict_types=1);

namespace MirayS\Marc\Support;

use Normalizer;

final class Text
{
    public static function normalize(string $value): string
    {
        if ($value === '') {
            return $value;
        }

        if (!class_exists(Normalizer::class)) {
            return $value;
        }

        if (Normalizer::isNormalized($value, Normalizer::FORM_C)) {
            return $value;
        }

        return Normalizer::normalize($value, Normalizer::FORM_C) ?: $value;
    }
}
