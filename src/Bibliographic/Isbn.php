<?php

declare(strict_types=1);

namespace MirayS\Marc\Bibliographic;

final class Isbn
{
    public static function normalize(string $value): ?string
    {
        $candidate = self::extract($value);

        if ($candidate === null) {
            return null;
        }

        if (strlen($candidate) === 10) {
            return self::isValid10($candidate) ? self::toIsbn13($candidate) : null;
        }

        return self::isValid13($candidate) ? $candidate : null;
    }

    public static function extract(string $value): ?string
    {
        $cleaned = strtoupper(preg_replace('/[^0-9Xx]/', '', explode(' ', trim($value))[0]) ?? '');

        if (preg_match('/^\d{13}$/', $cleaned) === 1) {
            return $cleaned;
        }

        if (preg_match('/^\d{9}[0-9X]$/', $cleaned) === 1) {
            return $cleaned;
        }

        $fallback = strtoupper(preg_replace('/[^0-9Xx]/', '', $value) ?? '');

        if (preg_match('/^\d{13}/', $fallback) === 1) {
            return substr($fallback, 0, 13);
        }

        if (preg_match('/^\d{9}[0-9X]/', $fallback) === 1) {
            return substr($fallback, 0, 10);
        }

        return null;
    }

    public static function toIsbn13(string $isbn10): string
    {
        $core = '978' . substr($isbn10, 0, 9);

        return $core . self::checkDigit13($core);
    }

    public static function isValid13(string $isbn): bool
    {
        if (preg_match('/^\d{13}$/', $isbn) !== 1) {
            return false;
        }

        return self::checkDigit13(substr($isbn, 0, 12)) === substr($isbn, 12, 1);
    }

    public static function isValid10(string $isbn): bool
    {
        if (preg_match('/^\d{9}[0-9X]$/', $isbn) !== 1) {
            return false;
        }

        $sum = 0;

        for ($i = 0; $i < 10; $i++) {
            $character = $isbn[$i];
            $digit = $character === 'X' ? 10 : (int) $character;
            $sum += $digit * (10 - $i);
        }

        return $sum % 11 === 0;
    }

    private static function checkDigit13(string $core): string
    {
        $sum = 0;

        for ($i = 0; $i < 12; $i++) {
            $sum += ((int) $core[$i]) * ($i % 2 === 0 ? 1 : 3);
        }

        return (string) ((10 - $sum % 10) % 10);
    }
}
