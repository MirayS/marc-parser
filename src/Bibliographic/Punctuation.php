<?php

declare(strict_types=1);

namespace MirayS\Marc\Bibliographic;

final class Punctuation
{
    private const ABBREVIATIONS = [
        'ed.', 'Ed.', 'etc.', 'Jr.', 'Sr.', 'Dr.', 'Mr.', 'Mrs.', 'Ms.', 'St.', 'vol.', 'Vol.',
        'no.', 'No.', 'pt.', 'Pt.', 'Aufl.', 'Bd.', 'Hrsg.', 'u.a.', 'usw.',
    ];

    public static function strip(string $value): string
    {
        $value = trim($value);
        $value = rtrim($value, " \t\n\r\0\x0B");
        $value = preg_replace('/\s*[\/:;,=]$/u', '', $value) ?? $value;
        $value = trim($value);

        if (str_ends_with($value, '.') && !self::endsWithAbbreviation($value)) {
            $value = rtrim(substr($value, 0, -1));
        }

        return trim($value, " \t\n\r\0\x0B");
    }

    public static function stripBrackets(string $value): string
    {
        $value = trim($value);

        if (str_starts_with($value, '[') && str_ends_with($value, ']')) {
            $value = substr($value, 1, -1);
        }

        return trim(str_replace(['[', ']'], '', $value));
    }

    private static function endsWithAbbreviation(string $value): bool
    {
        foreach (self::ABBREVIATIONS as $abbreviation) {
            if (str_ends_with($value, $abbreviation)) {
                return true;
            }
        }

        return preg_match('/(^|[\s.])[A-Z]\.$/u', $value) === 1;
    }
}
