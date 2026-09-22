<?php

declare(strict_types=1);

namespace MirayS\Marc\CodeList;

final class Marc8Tables
{
    public const BASIC_LATIN = 0x42;
    public const ANSEL = 0x45;
    public const EACC = 0x31;

    private const FILES = [
        0x31 => 'charset-31.php',
        0x32 => 'charset-32.php',
        0x33 => 'charset-33.php',
        0x34 => 'charset-34.php',
        0x42 => 'charset-42.php',
        0x45 => 'charset-45.php',
        0x4E => 'charset-4e.php',
        0x51 => 'charset-51.php',
        0x53 => 'charset-53.php',
        0x62 => 'charset-62.php',
        0x67 => 'charset-67.php',
        0x70 => 'charset-70.php',
    ];

    private const ODD = [
        0x21203D => 0x2026,
        0x212040 => 0x201C,
        0x7F2014 => 0x2014,
        0x7F2019 => 0x2019,
        0x7F2020 => 0x201D,
        0x7F2122 => 0x2122,
    ];

    private const IGNORED = [
        0x45 => [0xEC, 0xFB],
    ];

    /** @var array<int, array<int, array{int, bool}>> */
    private static array $loaded = [];

    public static function has(int $charset): bool
    {
        return isset(self::FILES[$charset]);
    }

    public static function isMultibyte(int $charset): bool
    {
        return $charset === self::EACC;
    }

    /**
     * @return array{int, bool}|null
     */
    public static function lookup(int $charset, int $code): ?array
    {
        return self::table($charset)[$code] ?? null;
    }

    public static function odd(int $code): ?int
    {
        return self::ODD[$code] ?? null;
    }

    public static function isIgnorable(int $charset, int $code): bool
    {
        return in_array($code, self::IGNORED[$charset] ?? [], true);
    }

    /**
     * @return array<int, array{int, bool}>
     */
    public static function table(int $charset): array
    {
        if (isset(self::$loaded[$charset])) {
            return self::$loaded[$charset];
        }

        $file = self::FILES[$charset] ?? null;

        if ($file === null) {
            return self::$loaded[$charset] = [];
        }

        /** @var array<int, array{int, bool}> $table */
        $table = require __DIR__ . '/Marc8/' . $file;

        return self::$loaded[$charset] = $table;
    }
}
