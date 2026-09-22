<?php

declare(strict_types=1);

$source = $argv[1] ?? __DIR__ . '/data/ecbdlist.html';
$raw = file_get_contents($source);

if ($raw === false) {
    fwrite(STDERR, sprintf("Cannot read %s\n", $source));
    exit(1);
}

$text = str_replace("\r\n", "\n", html_entity_decode(strip_tags($raw), ENT_QUOTES | ENT_HTML5, 'UTF-8'));

$fields = [];
$tag = null;
$section = null;
$indicator = null;

foreach (explode("\n", $text) as $line) {
    $line = rtrim($line);

    if (trim($line) === '') {
        continue;
    }

    $indent = strlen($line) - strlen(ltrim($line));
    $trimmed = trim($line);

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
        if (($match[4] ?? '') !== '') {
            continue;
        }

        $fields[$tag]['subfields'][$match[1]] = [
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
        $label = $match[3];

        foreach (range($from, $to) as $value) {
            $fields[$tag]['indicators'][$indicator]['values'][(string) $value] = $label;
        }
    }
}

$supplementRaw = file_get_contents(__DIR__ . '/data/marc21-supplement.json');
$supplement = is_string($supplementRaw)
    ? json_decode($supplementRaw, true, 512, JSON_THROW_ON_ERROR)
    : ['fields' => [], 'subfields' => []];

foreach ($supplement['fields'] ?? [] as $supplementTag => $definition) {
    $supplementTag = (string) $supplementTag;

    $fields[$supplementTag] ??= [
        'label' => (string) ($definition['label'] ?? ''),
        'repeatable' => (bool) ($definition['repeatable'] ?? false),
        'indicators' => [],
        'subfields' => [],
    ];

    foreach ($definition['subfields'] ?? [] as $code => $subfield) {
        $fields[$supplementTag]['subfields'][(string) $code] ??= [
            'label' => (string) ($subfield['label'] ?? ''),
            'repeatable' => (bool) ($subfield['repeatable'] ?? false),
        ];
    }
}

foreach ($supplement['subfields'] ?? [] as $supplementTag => $codes) {
    $supplementTag = (string) $supplementTag;

    if (!isset($fields[$supplementTag])) {
        continue;
    }

    foreach ($codes as $code => $subfield) {
        $fields[$supplementTag]['subfields'][(string) $code] ??= [
            'label' => (string) ($subfield['label'] ?? ''),
            'repeatable' => (bool) ($subfield['repeatable'] ?? false),
        ];
    }
}

foreach ($fields as $fieldTag => $field) {
    ksort($fields[$fieldTag]['subfields']);
}

ksort($fields);

$export = static function (array $values, int $indent): string {
    $pad = str_repeat(' ', $indent);
    $parts = [];

    foreach ($values as $key => $value) {
        $parts[] = $pad . var_export((string) $key, true) . ' => ' . var_export($value, true) . ',';
    }

    return implode("\n", $parts);
};

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
            $export($definition['values'], 20),
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

$class = "<?php\n\ndeclare(strict_types=1);\n\nnamespace MirayS\\Marc\\CodeList;\n\n"
    . "final class Fields\n{\n"
    . "    public const SOURCE = 'https://www.loc.gov/marc/bibliographic/ecbdlist.html';\n\n"
    . "    public const TAGS = [\n" . implode("\n", $blocks) . "\n    ];\n\n"
    . <<<'PHP'
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

file_put_contents(dirname(__DIR__) . '/src/CodeList/Fields.php', $class);

$subfieldCount = array_sum(array_map(static fn (array $field): int => count($field['subfields']), $fields));
$indicatorCount = array_sum(array_map(
    static fn (array $field): int => count(array_filter($field['indicators'], static fn (array $i): bool => $i['values'] !== [])),
    $fields,
));

printf("Fields.php: %d fields, %d subfields, %d defined indicators\n", count($fields), $subfieldCount, $indicatorCount);
