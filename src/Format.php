<?php

declare(strict_types=1);

namespace MirayS\Marc;

enum Format: string
{
    case Iso2709 = 'iso2709';
    case MarcXml = 'marcxml';
    case MarcJson = 'marc-in-json';

    public static function detect(string $sample): ?self
    {
        $trimmed = ltrim($sample, " \t\r\n\xEF\xBB\xBF");

        if ($trimmed === '') {
            return null;
        }

        if ($trimmed[0] === '<') {
            return self::MarcXml;
        }

        if ($trimmed[0] === '{' || $trimmed[0] === '[') {
            return self::MarcJson;
        }

        if (preg_match('/^\d{5}[\w ]{7}\d{5}/', $trimmed) === 1) {
            return self::Iso2709;
        }

        return null;
    }
}
