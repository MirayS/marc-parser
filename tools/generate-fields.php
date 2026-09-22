<?php

declare(strict_types=1);

const FORMATS = [
    [
        'file' => 'ecbdlist.html',
        'class' => 'Fields',
        'label' => 'MARC 21 Bibliographic',
        'url' => 'https://www.loc.gov/marc/bibliographic/ecbdlist.html',
        'supplement' => 'marc21-supplement.json',
    ],
    [
        'file' => 'ecadlist.html',
        'class' => 'AuthorityFields',
        'label' => 'MARC 21 Authority',
        'url' => 'https://www.loc.gov/marc/authority/ecadlist.html',
        'supplement' => null,
    ],
    [
        'file' => 'echdlist.html',
        'class' => 'HoldingsFields',
        'label' => 'MARC 21 Holdings',
        'url' => 'https://www.loc.gov/marc/holdings/echdlist.html',
        'supplement' => null,
    ],
];

/**
 * @return array<string, array{label: string, repeatable: bool, indicators: array<int, array{label: string, values: array<string, string>}>, subfields: array<string, array{label: string, repeatable: bool}>}>
 */
function parseConciseList(string $path): array
{
    $raw = file_get_contents($path);

    if ($raw === false) {
        fwrite(STDERR, sprintf("Cannot read %s\n", $path));
        exit(1);
    }

    $text = str_replace("\r\n", "\n", html_entity_decode(strip_tags($raw), ENT_QUOTES | ENT_HTML5, 'UTF-8'));

    $fields = [];
    $tag = null;
    $section = null;
    $indicator = null;

    foreach (explode("\n", $text) as $line) {
        $line = rtrim($line);
        $trimmed = trim($line);

        if ($trimmed === '') {
            continue;
        }

        $indent = strlen($line) - strlen(ltrim($line));

        if ($indent === 0 && preg_match('/^(\d{3}) - /', $trimmed) === 1) {
            $section = null;
            $indicator = null;
            $tag = null;

            if (preg_match('/^(\d{3}) - (.+?)\s*\((R|NR)\)$/', $trimmed, $match) !== 1) {
                continue;
            }

            $tag = $match[1];
            $fields[$tag] ??= [
                'label' => ucfirst(strtolower($match[2])),
                'repeatable' => $match[3] === 'R',
                'indicators' => [],
                'subfields' => [],
            ];

            continue;
        }

        if ($tag === null) {
            continue;
        }

        if ($trimmed === 'Indicators') {
            $section = 'indicators';
            $indicator = null;

            continue;
        }

        if ($trimmed === 'Subfield Codes') {
            $section = 'subfields';
            $indicator = null;

            continue;
        }

        if ($section === 'subfields' && preg_match('/^\$(.) - (.+?)\s*\((R|NR)\)\s*(\[OBSOLETE[^\]]*\])?$/', $trimmed, $match) === 1) {
            if (str_contains($trimmed, '[OBSOLETE')) {
                continue;
            }

            $fields[$tag]['subfields'][$match[1]] ??= [
                'label' => $match[2],
                'repeatable' => $match[3] === 'R',
            ];

            continue;
        }

        if ($section !== 'indicators') {
            continue;
        }

        if (preg_match('/^(First|Second) - (.+)$/', $trimmed, $match) === 1) {
            $indicator = null;

            if (str_contains($match[2], '[OBSOLETE')) {
                continue;
            }

            $indicator = $match[1] === 'First' ? 1 : 2;
            $fields[$tag]['indicators'][$indicator] ??= [
                'label' => rtrim($match[2], ' .'),
                'values' => [],
            ];

            continue;
        }

        if ($indicator === null) {
            continue;
        }

        if (preg_match('/^([#0-9a-z])(?:-([#0-9a-z]))? - (.+?)\s*(\[OBSOLETE[^\]]*\])?$/', $trimmed, $match) === 1) {
            if (str_contains($trimmed, '[OBSOLETE')) {
                continue;
            }

            $from = $match[1] === '#' ? ' ' : $match[1];
            $to = $match[2] === '' ? $from : ($match[2] === '#' ? ' ' : $match[2]);

            foreach (range($from, $to) as $value) {
                $fields[$tag]['indicators'][$indicator]['values'][(string) $value] ??= $match[3];
            }
        }
    }

    return $fields;
}

/**
 * @param array<string, mixed> $fields
 *
 * @return array<string, mixed>
 */
function mergeSupplement(array $fields, string $path): array
{
    $raw = file_get_contents($path);

    if ($raw === false) {
        return $fields;
    }

    $supplement = json_decode($raw, true, 512, JSON_THROW_ON_ERROR);

    foreach ($supplement['fields'] ?? [] as $tag => $definition) {
        $tag = (string) $tag;
        $fields[$tag] ??= [
            'label' => (string) ($definition['label'] ?? ''),
            'repeatable' => (bool) ($definition['repeatable'] ?? false),
            'indicators' => [],
            'subfields' => [],
        ];

        foreach ($definition['subfields'] ?? [] as $code => $subfield) {
            $fields[$tag]['subfields'][(string) $code] ??= [
                'label' => (string) ($subfield['label'] ?? ''),
                'repeatable' => (bool) ($subfield['repeatable'] ?? false),
            ];
        }
    }

    foreach ($supplement['subfields'] ?? [] as $tag => $codes) {
        $tag = (string) $tag;

        if (!isset($fields[$tag])) {
            continue;
        }

        foreach ($codes as $code => $subfield) {
            $fields[$tag]['subfields'][(string) $code] ??= [
                'label' => (string) ($subfield['label'] ?? ''),
                'repeatable' => (bool) ($subfield['repeatable'] ?? false),
            ];
        }
    }

    return $fields;
}

/**
 * @param array<string, mixed> $values
 */
function exportValues(array $values, int $indent): string
{
    $pad = str_repeat(' ', $indent);
    $parts = [];

    foreach ($values as $key => $value) {
        $parts[] = $pad . var_export((string) $key, true) . ' => ' . var_export($value, true) . ',';
    }

    return implode("\n", $parts);
}

/**
 * @param array<string, mixed> $fields
 */
function renderClass(string $class, string $label, string $url, array $fields): string
{
    $blocks = [];

    foreach ($fields as $tag => $field) {
        $indicators = [];

        foreach ($field['indicators'] as $position => $definition) {
            if ($definition['values'] === []) {
                continue;
            }

            $indicators[] = sprintf(
                "            %d => [\n                'label' => %s,\n                'values' => [\n%s\n                ],\n            ],",
                $position,
                var_export($definition['label'], true),
                exportValues($definition['values'], 20),
            );
        }

        $subfields = [];

        foreach ($field['subfields'] as $code => $definition) {
            $subfields[] = sprintf(
                "            %s => ['label' => %s, 'repeatable' => %s],",
                var_export((string) $code, true),
                var_export($definition['label'], true),
                $definition['repeatable'] ? 'true' : 'false',
            );
        }

        $blocks[] = sprintf(
            "    %s => [\n        'label' => %s,\n        'repeatable' => %s,\n        'indicators' => [%s],\n        'subfields' => [%s],\n    ],",
            var_export((string) $tag, true),
            var_export($field['label'], true),
            $field['repeatable'] ? 'true' : 'false',
            $indicators === [] ? '' : "\n" . implode("\n", $indicators) . "\n        ",
            $subfields === [] ? '' : "\n" . implode("\n", $subfields) . "\n        ",
        );
    }

    $body = <<<'PHP'
    public static function exists(string $tag): bool
    {
        return isset(self::TAGS[$tag]);
    }

    public static function isLocal(string $tag): bool
    {
        return !isset(self::TAGS[$tag]) && str_contains($tag, '9');
    }

    public static function isLocalSubfield(string $code): bool
    {
        return $code === '9';
    }

    public static function acceptsAnySubfield(string $tag): bool
    {
        return $tag === '880' || $tag === '886';
    }

    public static function label(string $tag): ?string
    {
        return self::TAGS[$tag]['label'] ?? null;
    }

    public static function isRepeatable(string $tag): ?bool
    {
        return self::TAGS[$tag]['repeatable'] ?? null;
    }

    public static function subfieldLabel(string $tag, string $code): ?string
    {
        return self::TAGS[$tag]['subfields'][$code]['label'] ?? null;
    }

    public static function subfieldExists(string $tag, string $code): bool
    {
        return isset(self::TAGS[$tag]['subfields'][$code]);
    }

    public static function isSubfieldRepeatable(string $tag, string $code): ?bool
    {
        return self::TAGS[$tag]['subfields'][$code]['repeatable'] ?? null;
    }

    /**
     * @return array<string, array{label: string, repeatable: bool}>
     */
    public static function subfields(string $tag): array
    {
        return self::TAGS[$tag]['subfields'] ?? [];
    }

    public static function indicatorLabel(string $tag, int $position): ?string
    {
        return self::TAGS[$tag]['indicators'][$position]['label'] ?? null;
    }

    /**
     * @return array<string, string>
     */
    public static function indicatorValues(string $tag, int $position): array
    {
        return self::TAGS[$tag]['indicators'][$position]['values'] ?? [];
    }

    public static function indicatorIsDefined(string $tag, int $position, string $value): ?bool
    {
        $values = self::indicatorValues($tag, $position);

        return $values === [] ? null : isset($values[$value]);
    }
}

PHP;

    return "<?php\n\ndeclare(strict_types=1);\n\nnamespace MirayS\\Marc\\CodeList;\n\n"
        . sprintf("final class %s\n{\n", $class)
        . sprintf("    public const FORMAT = %s;\n\n", var_export($label, true))
        . sprintf("    public const SOURCE = %s;\n\n", var_export($url, true))
        . "    public const TAGS = [\n" . implode("\n", $blocks) . "\n    ];\n\n"
        . $body;
}

foreach (FORMATS as $format) {
    $fields = parseConciseList(__DIR__ . '/data/' . $format['file']);

    if ($format['supplement'] !== null) {
        $fields = mergeSupplement($fields, __DIR__ . '/data/' . $format['supplement']);
    }

    foreach ($fields as $tag => $field) {
        ksort($fields[$tag]['subfields']);
    }

    ksort($fields);

    file_put_contents(
        dirname(__DIR__) . '/src/CodeList/' . $format['class'] . '.php',
        renderClass($format['class'], $format['label'], $format['url'], $fields),
    );

    $subfields = array_sum(array_map(static fn (array $field): int => count($field['subfields']), $fields));
    $indicators = array_sum(array_map(
        static fn (array $field): int => count(array_filter($field['indicators'], static fn (array $i): bool => $i['values'] !== [])),
        $fields,
    ));

    printf(
        "%-20s %3d fields, %4d subfields, %3d defined indicators\n",
        $format['class'] . '.php',
        count($fields),
        $subfields,
        $indicators,
    );
}
