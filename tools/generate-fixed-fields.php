<?php

declare(strict_types=1);

const SOURCES = [
    'bibliographic' => ['file' => 'ecbdlist.html', 'url' => 'https://www.loc.gov/marc/bibliographic/ecbdlist.html'],
    'authority' => ['file' => 'ecadlist.html', 'url' => 'https://www.loc.gov/marc/authority/ecadlist.html'],
    'holdings' => ['file' => 'echdlist.html', 'url' => 'https://www.loc.gov/marc/holdings/echdlist.html'],
];

const MATERIALS = [
    'ALL MATERIALS' => 'ALL',
    'BOOKS' => 'BK',
    'COMPUTER FILES' => 'CF',
    'COMPUTER FILES/ELECTRONIC RESOURCES' => 'CF',
    'MAPS' => 'MP',
    'MUSIC' => 'MU',
    'CONTINUING RESOURCES' => 'CR',
    'VISUAL MATERIALS' => 'VM',
    'MIXED MATERIALS' => 'MX',
];

const CATEGORIES = [
    'MAP' => 'a',
    'ELECTRONIC RESOURCE' => 'c',
    'GLOBE' => 'd',
    'TACTILE MATERIAL' => 'f',
    'PROJECTED GRAPHIC' => 'g',
    'MICROFORM' => 'h',
    'NONPROJECTED GRAPHIC' => 'k',
    'MOTION PICTURE' => 'm',
    'KIT' => 'o',
    'NOTATED MUSIC' => 'q',
    'REMOTE-SENSING IMAGE' => 'r',
    'SOUND RECORDING' => 's',
    'TEXT' => 't',
    'VIDEORECORDING' => 'v',
    'UNSPECIFIED' => 'z',
];

function camelKey(string $label): string
{
    $label = preg_replace('/\(.*?\)/', ' ', $label) ?? $label;
    $label = preg_replace('/\[.*?\]/', ' ', $label) ?? $label;
    $label = preg_replace('/[^A-Za-z0-9]+/', ' ', $label) ?? $label;
    $parts = array_values(array_filter(explode(' ', trim($label))));

    if ($parts === []) {
        return 'undefined';
    }

    $key = strtolower(array_shift($parts));

    foreach ($parts as $part) {
        $key .= ucfirst(strtolower($part));
    }

    return $key;
}

/**
 * @return array<string, array<string, array<string, array{offset: int, length: int, label: string, values: array<string, string>}>>>
 */
function parseFixedFields(string $path): array
{
    $raw = file_get_contents($path);

    if ($raw === false) {
        fwrite(STDERR, sprintf("Cannot read %s\n", $path));
        exit(1);
    }

    $text = str_replace("\r\n", "\n", html_entity_decode(strip_tags($raw), ENT_QUOTES | ENT_HTML5, 'UTF-8'));

    $blocks = [];
    $tag = null;
    $variant = null;
    $inPositions = false;
    $position = null;

    foreach (explode("\n", $text) as $line) {
        $trimmed = trim($line);

        if ($trimmed === '') {
            continue;
        }

        $indent = strlen($line) - strlen(ltrim($line));

        if (in_array(strtolower($trimmed), ['directory', 'variable fields', 'variable control fields', 'variable data fields'], true)) {
            $tag = null;
            $variant = null;
            $inPositions = false;
            $position = null;

            continue;
        }

        if ($trimmed === 'LEADER') {
            $tag = 'LDR';
            $variant = 'ALL';
            $inPositions = false;
            $position = null;

            continue;
        }

        if (preg_match('/^(00[678])--(.+)$/', $trimmed, $match) === 1) {
            $tag = $match[1];
            $name = strtoupper(trim($match[2]));
            $variant = $tag === '007'
                ? (CATEGORIES[$name] ?? null)
                : (MATERIALS[$name] ?? null);
            $inPositions = false;
            $position = null;

            continue;
        }

        if ($indent === 0 && preg_match('/^(\d{3}) - /', $trimmed, $match) === 1) {
            $tag = in_array($match[1], ['006', '007', '008'], true) ? $match[1] : null;
            $variant = $tag === null ? null : 'ALL';
            $inPositions = false;
            $position = null;

            continue;
        }

        if ($indent === 0 && preg_match('/^[A-Z][A-Za-z ]+$/', $trimmed) === 1 && strcasecmp($trimmed, 'Character Positions') !== 0) {
            $tag = null;
            $variant = null;

            continue;
        }

        if ($tag === null || $variant === null) {
            continue;
        }

        if (strcasecmp($trimmed, 'Character Positions') === 0) {
            $inPositions = true;
            $position = null;

            continue;
        }

        if (!$inPositions) {
            continue;
        }

        if (preg_match('/^(\d{2})(?:-(\d{2}))? - (.+?)\s*(\[OBSOLETE[^\]]*\])?$/', $trimmed, $match) === 1) {
            $position = null;

            if (str_contains($trimmed, '[OBSOLETE')) {
                continue;
            }

            $from = (int) $match[1];
            $to = $match[2] === '' ? $from : (int) $match[2];
            $label = $match[3];
            $key = camelKey($label);

            if (str_starts_with(strtolower($label), 'undefined')) {
                continue;
            }

            $blocks[$tag][$variant][$key] ??= [
                'offset' => $from,
                'length' => $to - $from + 1,
                'label' => $label,
                'values' => [],
            ];

            $position = $key;

            continue;
        }

        if ($position === null) {
            continue;
        }

        if (preg_match('/^(.)(?:-(.))? - (.+?)\s*(\[OBSOLETE[^\]]*\])?$/u', $trimmed, $match) === 1) {
            if (str_contains($trimmed, '[OBSOLETE')) {
                continue;
            }

            $from = $match[1] === '#' ? ' ' : $match[1];
            $to = $match[2] === '' ? $from : ($match[2] === '#' ? ' ' : $match[2]);

            if (strlen($from) !== 1 || strlen($to) !== 1) {
                continue;
            }

            foreach (range($from, $to) as $value) {
                $blocks[$tag][$variant][$position]['values'][(string) $value] ??= $match[3];
            }
        }
    }

    return $blocks;
}

/**
 * @param array<string, mixed> $values
 */
function exportArray(array $values, int $indent): string
{
    $pad = str_repeat(' ', $indent);
    $parts = [];

    foreach ($values as $key => $value) {
        $parts[] = $pad . var_export((string) $key, true) . ' => ' . var_export($value, true) . ',';
    }

    return implode("\n", $parts);
}

$formats = [];
$stats = [];

foreach (SOURCES as $format => $source) {
    $blocks = parseFixedFields(__DIR__ . '/data/' . $source['file']);
    ksort($blocks);
    $formats[$format] = $blocks;

    $positions = 0;
    $values = 0;

    foreach ($blocks as $variants) {
        foreach ($variants as $entries) {
            $positions += count($entries);

            foreach ($entries as $entry) {
                $values += count($entry['values']);
            }
        }
    }

    $stats[$format] = [count($blocks), $positions, $values];
}

$rendered = [];

foreach ($formats as $format => $blocks) {
    $blockCode = [];

    foreach ($blocks as $tag => $variants) {
        ksort($variants);
        $variantCode = [];

        foreach ($variants as $variant => $entries) {
            $entryCode = [];

            foreach ($entries as $key => $entry) {
                $entryCode[] = sprintf(
                    "                %s => [\n                    'offset' => %d,\n                    'length' => %d,\n                    'label' => %s,\n                    'values' => [%s],\n                ],",
                    var_export((string) $key, true),
                    $entry['offset'],
                    $entry['length'],
                    var_export($entry['label'], true),
                    $entry['values'] === [] ? '' : "\n" . exportArray($entry['values'], 24) . "\n                    ",
                );
            }

            $variantCode[] = sprintf(
                "            %s => [\n%s\n            ],",
                var_export((string) $variant, true),
                implode("\n", $entryCode),
            );
        }

        $blockCode[] = sprintf("        %s => [\n%s\n        ],", var_export((string) $tag, true), implode("\n", $variantCode));
    }

    $rendered[] = sprintf("    %s => [\n%s\n    ],", var_export((string) $format, true), implode("\n", $blockCode));
}

$class = "<?php\n\ndeclare(strict_types=1);\n\nnamespace MirayS\\Marc\\CodeList;\n\n"
    . "final class FixedFields\n{\n"
    . "    public const SOURCES = [\n"
    . implode("\n", array_map(
        static fn (string $format, array $source): string => sprintf('        %s => %s,', var_export($format, true), var_export($source['url'], true)),
        array_keys(SOURCES),
        SOURCES,
    ))
    . "\n    ];\n\n"
    . "    public const BLOCKS = [\n" . implode("\n", $rendered) . "\n    ];\n\n"
    . <<<'PHP'
    /**
     * @return array<string, array{offset: int, length: int, label: string, values: array<string, string>}>
     */
    public static function positions(string $format, string $tag, string $variant = 'ALL'): array
    {
        $block = self::BLOCKS[$format][$tag] ?? [];

        if ($tag === '008' && $variant !== 'ALL') {
            return array_merge($block['ALL'] ?? [], $block[$variant] ?? []);
        }

        return $block[$variant] ?? [];
    }

    /**
     * @return array<string, string>
     */
    public static function variants(string $format, string $tag): array
    {
        return array_map(
            static fn (array $entries): string => (string) count($entries),
            self::BLOCKS[$format][$tag] ?? [],
        );
    }

    public static function label(string $format, string $tag, string $variant, string $key): ?string
    {
        return self::positions($format, $tag, $variant)[$key]['label'] ?? null;
    }

    /**
     * @return array<string, string>
     */
    public static function values(string $format, string $tag, string $variant, string $key): array
    {
        return self::positions($format, $tag, $variant)[$key]['values'] ?? [];
    }

    public static function valueLabel(string $format, string $tag, string $variant, string $key, string $value): ?string
    {
        return self::values($format, $tag, $variant, $key)[$value] ?? null;
    }
}

PHP;

file_put_contents(dirname(__DIR__) . '/src/CodeList/FixedFields.php', $class);

foreach ($stats as $format => [$blocks, $positions, $values]) {
    printf("%-16s %d fixed fields, %4d positions, %4d coded values\n", $format, $blocks, $positions, $values);
}
