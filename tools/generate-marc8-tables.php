<?php

declare(strict_types=1);

$source = $argv[1] ?? __DIR__ . '/data/codetables.xml';
$target = dirname(__DIR__) . '/src/CodeList/Marc8';

$raw = file_get_contents($source);

if ($raw === false) {
    fwrite(STDERR, sprintf("Cannot read %s\n", $source));
    exit(1);
}

$document = new SimpleXMLElement($raw, LIBXML_PARSEHUGE | LIBXML_COMPACT);

$odd = [
    0x21203D => 0x2026,
    0x212040 => 0x201C,
    0x7F2014 => 0x2014,
    0x7F2019 => 0x2019,
    0x7F2020 => 0x201D,
    0x7F2122 => 0x2122,
];

$written = [];
$names = [];
$ignored = [];

foreach ($document->xpath('//characterSet') ?: [] as $characterSet) {
    $charset = hexdec((string) $characterSet['ISOcode']);
    $name = (string) $characterSet['name'];
    $table = [];
    $skippedCodes = [];

    foreach ($characterSet->xpath('.//code') ?: [] as $code) {
        $ucs = trim((string) $code->ucs);

        if ($ucs === '') {
            $marc = trim((string) $code->marc);

            if ($marc !== '') {
                $skippedCodes[] = hexdec($marc);
            }

            continue;
        }

        $combining = trim((string) $code->isCombining) === 'true';

        foreach (['marc', 'alt'] as $element) {
            foreach ($code->{$element} as $value) {
                $marc = trim((string) $value);

                if ($element === 'alt' || $marc === '') {
                    continue;
                }

                $table[hexdec($marc)] = [hexdec($ucs), $combining];
            }
        }
    }

    if ($table === []) {
        continue;
    }

    ksort($table, SORT_NUMERIC);

    $lines = [];

    foreach ($table as $marc => [$unicode, $combining]) {
        $lines[] = sprintf('    0x%X => [0x%X, %s],', $marc, $unicode, $combining ? 'true' : 'false');
    }

    $file = sprintf('%s/charset-%02x.php', $target, $charset);
    file_put_contents(
        $file,
        "<?php\n\ndeclare(strict_types=1);\n"
        . sprintf("\n// MARC-8 %s, code set 0x%02X, from the Library of Congress code tables.\n\nreturn [\n", $name, $charset)
        . implode("\n", $lines)
        . "\n];\n",
    );

    $written[$charset] = count($table);
    $names[$charset] = $name;
    $ignored[$charset] = $skippedCodes;
    printf(
        "charset-%02x.php  %-34s %6d characters%s\n",
        $charset,
        $name,
        count($table),
        $skippedCodes === [] ? '' : sprintf(' (%d without a Unicode mapping)', count($skippedCodes)),
    );
}

ksort($written);

$codesets = [];

foreach (array_keys($written) as $charset) {
    $codesets[] = sprintf("        0x%02X => 'charset-%02x.php',", $charset, $charset);
}

$ignoredLines = [];

foreach ($ignored as $charset => $codes) {
    if ($codes === []) {
        continue;
    }

    sort($codes);
    $ignoredLines[] = sprintf(
        '        0x%02X => [%s],',
        $charset,
        implode(', ', array_map(static fn (int $code): string => sprintf('0x%X', $code), $codes)),
    );
}

$oddLines = [];

foreach ($odd as $code => $unicode) {
    $oddLines[] = sprintf('        0x%X => 0x%X,', $code, $unicode);
}

$class = "<?php\n\ndeclare(strict_types=1);\n" . <<<'PHP'

namespace MirayS\Marc\CodeList;

final class Marc8Tables
{
    public const BASIC_LATIN = 0x42;
    public const ANSEL = 0x45;
    public const EACC = 0x31;

    private const FILES = [
__CODESETS__
    ];

    private const ODD = [
__ODD__
    ];

    private const IGNORED = [
__IGNORED__
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

PHP;

$class = str_replace(
    ['__CODESETS__', '__ODD__', '__IGNORED__'],
    [implode("\n", $codesets), implode("\n", $oddLines), implode("\n", $ignoredLines)],
    $class,
);

file_put_contents(dirname($target) . '/Marc8Tables.php', $class);
printf("Marc8Tables.php (%d code sets, %d characters, %d odd mappings)\n", count($codesets), array_sum($written), count($oddLines));
