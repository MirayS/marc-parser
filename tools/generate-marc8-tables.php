<?php

declare(strict_types=1);

$source = $argv[1] ?? dirname(__DIR__) . '/tools/data/marc8-mapping.json';
$target = dirname(__DIR__) . '/src/CodeList/Marc8';

$raw = file_get_contents($source);

if ($raw === false) {
    fwrite(STDERR, sprintf("Cannot read %s\n", $source));
    exit(1);
}

$data = json_decode($raw, true, 512, JSON_THROW_ON_ERROR);

if (!is_array($data) || !isset($data['codesets']) || !is_array($data['codesets'])) {
    fwrite(STDERR, "Mapping file has no codesets\n");
    exit(1);
}

$names = [
    0x42 => 'Basic Latin (ASCII)',
    0x45 => 'Extended Latin (ANSEL)',
    0x31 => 'Chinese, Japanese, Korean (EACC)',
    0x32 => 'Basic Hebrew',
    0x33 => 'Basic Arabic',
    0x34 => 'Extended Arabic',
    0x4E => 'Basic Cyrillic',
    0x51 => 'Extended Cyrillic',
    0x53 => 'Basic Greek',
    0x62 => 'Subscripts',
    0x67 => 'Greek symbols',
    0x70 => 'Superscripts',
];

$header = <<<'TXT'
<?php

declare(strict_types=1);

TXT;

$written = [];

foreach ($data['codesets'] as $charset => $table) {
    $charset = (int) $charset;

    if (!is_array($table)) {
        continue;
    }

    ksort($table, SORT_NUMERIC);

    $lines = [];

    foreach ($table as $code => $entry) {
        if (!is_array($entry)) {
            continue;
        }

        $lines[] = sprintf(
            '    0x%X => [0x%X, %s],',
            (int) $code,
            (int) $entry[0],
            ($entry[1] ?? false) ? 'true' : 'false',
        );
    }

    $file = sprintf('%s/charset-%02x.php', $target, $charset);
    $contents = $header
        . sprintf("\n// MARC-8 %s, code set 0x%02X.\n\nreturn [\n", $names[$charset] ?? 'code set', $charset)
        . implode("\n", $lines)
        . "\n];\n";

    file_put_contents($file, $contents);
    $written[$charset] = count($lines);
    printf("charset-%02x.php (%d entries)\n", $charset, count($lines));
}

$odd = [];

foreach ($data['odd'] ?? [] as $code => $unicode) {
    $odd[] = sprintf('        0x%X => 0x%X,', (int) $code, (int) $unicode);
}

$codesets = [];

foreach (array_keys($written) as $charset) {
    $codesets[] = sprintf("        0x%02X => 'charset-%02x.php',", $charset, $charset);
}

$class = $header . <<<'PHP'

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
    ['__CODESETS__', '__ODD__'],
    [implode("\n", $codesets), implode("\n", $odd)],
    $class,
);

file_put_contents(dirname($target) . '/Marc8Tables.php', $class);
printf("Marc8Tables.php (%d code sets, %d odd mappings)\n", count($codesets), count($odd));
