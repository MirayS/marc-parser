<?php

declare(strict_types=1);

const SOURCES = [
    'languages' => 'https://id.loc.gov/vocabulary/languages.json',
    'countries' => 'https://id.loc.gov/vocabulary/countries.json',
    'relators' => 'https://id.loc.gov/vocabulary/relators.json',
];

const COUNTRY_ALIASES = [
    'gw' => 'DE', 'xxk' => 'GB', 'xxu' => 'US', 'xxc' => 'CA', 'xxa' => 'AU', 'xx' => null,
    'ko' => 'KR', 'kn' => 'KP', 'ru' => 'RU', 'un' => 'UA', 'cc' => 'CN', 'ch' => 'CN',
    'ii' => 'IN', 'ja' => 'JP', 'fr' => 'FR', 'it' => 'IT', 'sp' => 'ES', 'sw' => 'SE',
    'sz' => 'CH', 'ne' => 'NL', 'be' => 'BE', 'au' => 'AT', 'dk' => 'DK', 'fi' => 'FI',
    'no' => 'NO', 'pl' => 'PL', 'gr' => 'GR', 'po' => 'PT', 'ie' => 'IE', 'is' => 'IL',
    'tu' => 'TR', 'bl' => 'BR', 'mx' => 'MX', 'ag' => 'AR', 'cl' => 'CL', 'pe' => 'PE',
    've' => 'VE', 'nz' => 'NZ', 'at' => 'AU', 'sa' => 'ZA', 'ua' => 'EG', 'vm' => 'VN',
    'th' => 'TH', 'ph' => 'PH', 'io' => 'ID', 'my' => 'MY', 'si' => 'SG', 'ce' => 'LK',
    'cr' => 'CR', 'cu' => 'CU', 'dr' => 'DO', 'ck' => 'CO', 'sy' => 'SY', 'ir' => 'IR',
    'iq' => 'IQ', 'su' => 'SA', 'ti' => 'TN', 'mr' => 'MA', 'ts' => 'AE', 'hu' => 'HU',
    'rm' => 'RO', 'bu' => 'BG', 'ci' => 'HR', 'rb' => 'RS', 'xv' => 'SI', 'xo' => 'SK',
    'xr' => 'CZ', 'er' => 'EE', 'li' => 'LT', 'lv' => 'LV', 'bw' => 'BY', 'gt' => 'GT',
    'ho' => 'HN', 'nq' => 'NI', 'es' => 'SV', 'pn' => 'PA', 'uy' => 'UY', 'py' => 'PY',
    'bo' => 'BO', 'ec' => 'EC', 'gy' => 'GY', 'sr' => 'SR', 'jm' => 'JM', 'ht' => 'HT',
    'nr' => 'NG', 'ke' => 'KE', 'tz' => 'TZ', 'gh' => 'GH', 'et' => 'ET', 'sd' => 'SS',
    'ly' => 'LY', 'ae' => 'DZ', 'pk' => 'PK', 'bg' => 'BD', 'np' => 'NP', 'afg' => 'AF',
    'ai' => 'AM', 'aj' => 'AZ', 'gs' => 'GE', 'kz' => 'KZ', 'uz' => 'UZ', 'tk' => 'TM',
    'kg' => 'KG', 'ta' => 'TJ', 'mp' => 'MN', 'ba' => 'BH', 'ku' => 'KW', 'qa' => 'QA',
    'mk' => 'OM', 'ye' => 'YE', 'jo' => 'JO', 'le' => 'LB', 'cy' => 'CY', 'mm' => 'MT',
    'lu' => 'LU', 'ic' => 'IS', 'lh' => 'LI', 'mc' => 'MC', 'vc' => 'VA', 'an' => 'AD',
    'sm' => 'SM', 'mv' => 'MD', 'al' => 'AL', 'bn' => 'BA', 'mo' => 'ME', 'kv' => 'XK',
    'bm' => 'BM', 'br' => 'MM', 'cf' => 'CG', 'cg' => 'CD', 'cv' => 'CV', 'fs' => 'TF',
    'gz' => 'PS', 'iv' => 'CI', 'iy' => null, 'ji' => 'UM', 'pc' => 'PN', 'pf' => null,
    'sc' => 'BL', 'sh' => 'ES', 'st' => 'MF', 'uc' => 'UM', 'up' => 'UM', 'vi' => 'VI',
    'vp' => null, 'wj' => 'PS', 'wk' => 'UM', 'xd' => 'KN', 'xf' => 'UM', 'xj' => 'SH',
    'xk' => 'LC', 'xl' => 'PM', 'xm' => 'VC', 'xp' => null,
];

const DEPRECATED_ISO = [
    'AN', 'BU', 'CS', 'CT', 'DD', 'DY', 'EU', 'FQ', 'FX', 'HV', 'JT', 'MI', 'NH', 'NQ', 'NT',
    'PC', 'PU', 'PZ', 'QO', 'QU', 'RH', 'SU', 'TP', 'UK', 'VD', 'WK', 'YD', 'YU', 'ZR', 'ZZ',
];

function fetch(string $url): string
{
    $context = stream_context_create([
        'http' => ['header' => "User-Agent: mirays/marc code list generator\r\n", 'timeout' => 180],
    ]);
    $body = file_get_contents($url, false, $context);

    if ($body === false) {
        fwrite(STDERR, sprintf("Cannot download %s\n", $url));
        exit(1);
    }

    return $body;
}

/**
 * @return array<mixed>
 */
function decode(string $json): array
{
    $data = json_decode($json, true, 512, JSON_THROW_ON_ERROR);

    return is_array($data) ? $data : [];
}

/**
 * @param array<mixed> $vocabulary
 *
 * @return array<string, string>
 */
function labels(array $vocabulary): array
{
    $codes = [];

    foreach ($vocabulary as $concept) {
        if (!is_array($concept)) {
            continue;
        }

        $code = $concept['http://www.loc.gov/mads/rdf/v1#code'][0]['@value'] ?? null;

        if (!is_string($code) || preg_match('/^[a-z]{2,3}$/', $code) !== 1) {
            continue;
        }

        foreach ($concept['http://www.loc.gov/mads/rdf/v1#authoritativeLabel'] ?? [] as $label) {
            $language = $label['@language'] ?? 'en';

            if ($language === 'en' && is_string($label['@value'] ?? null)) {
                $codes[$code] = $label['@value'];

                break;
            }
        }
    }

    ksort($codes);

    return $codes;
}

/**
 * @return array<string, string>
 */
function isoRegions(): array
{
    $regions = [];

    for ($first = ord('A'); $first <= ord('Z'); $first++) {
        for ($second = ord('A'); $second <= ord('Z'); $second++) {
            $code = chr($first) . chr($second);
            $name = Locale::getDisplayRegion('-' . $code, 'en');

            $key = normalizeName($name);

            if ($name !== '' && $name !== $code && !in_array($code, DEPRECATED_ISO, true) && !isset($regions[$key])) {
                $regions[$key] = $code;
            }
        }
    }

    return $regions;
}

function normalizeName(string $name): string
{
    $name = Normalizer::normalize($name, Normalizer::FORM_D) ?: $name;
    $name = preg_replace('/[\x{0300}-\x{036f}]/u', '', $name) ?? $name;
    $name = strtolower($name);
    $name = preg_replace('/\(.*?\)/', ' ', $name) ?? $name;
    $name = str_replace(['&', '.', ',', '-', "'"], [' and ', ' ', ' ', ' ', ''], $name);
    $name = preg_replace('/\b(the|republic of|kingdom of|state of|islamic|democratic)\b/', ' ', $name) ?? $name;

    return trim(preg_replace('/\s+/', ' ', $name) ?? $name);
}

/**
 * @param array<string, string> $regions
 */
function countryIso(string $code, string $name, array $regions): ?string
{
    if (array_key_exists($code, COUNTRY_ALIASES)) {
        return COUNTRY_ALIASES[$code];
    }

    $normalized = normalizeName($name);

    if (isset($regions[$normalized])) {
        return $regions[$normalized];
    }

    if (strlen($code) === 3) {
        return match (substr($code, 2, 1)) {
            'u' => 'US',
            'c' => 'CA',
            'k' => 'GB',
            'a' => 'AU',
            default => null,
        };
    }

    return null;
}

function classHeader(string $class, string $source): string
{
    return sprintf(
        "<?php\n\ndeclare(strict_types=1);\n\nnamespace MirayS\\Marc\\CodeList;\n\nfinal class %s\n{\n",
        $class,
    ) . sprintf("    public const SOURCE = %s;\n\n", var_export($source, true));
}

/**
 * @param array<int|string, mixed> $values
 */
function exportMap(array $values, int $indent = 8): string
{
    $pad = str_repeat(' ', $indent);
    $lines = [];

    foreach ($values as $key => $value) {
        $lines[] = $pad . var_export((string) $key, true) . ' => ' . exportValue($value, $indent) . ',';
    }

    return implode("\n", $lines);
}

function exportValue(mixed $value, int $indent): string
{
    if (!is_array($value)) {
        return var_export($value, true);
    }

    $parts = [];

    foreach ($value as $key => $item) {
        $parts[] = var_export((string) $key, true) . ' => ' . exportValue($item, $indent + 4);
    }

    return '[' . implode(', ', $parts) . ']';
}

function write(string $path, string $contents): void
{
    file_put_contents($path, $contents);
    printf("%s (%d bytes)\n", basename($path), strlen($contents));
}

$target = dirname(__DIR__) . '/src/CodeList';

$languages = labels(decode(fetch(SOURCES['languages'])));
$relators = labels(decode(fetch(SOURCES['relators'])));
$countriesRaw = labels(decode(fetch(SOURCES['countries'])));

$regions = isoRegions();
$countries = [];
$unmapped = [];

foreach ($countriesRaw as $code => $name) {
    $iso = countryIso($code, $name, $regions);
    $countries[$code] = ['name' => $name, 'iso' => $iso];

    if ($iso === null) {
        $unmapped[] = $code;
    }
}

write($target . '/Languages.php', classHeader('Languages', SOURCES['languages'])
    . "    public const CODES = [\n" . exportMap($languages) . "\n    ];\n\n"
    . <<<'PHP'
    public static function name(string $code): ?string
    {
        return self::CODES[strtolower(trim($code))] ?? null;
    }

    public static function exists(string $code): bool
    {
        return isset(self::CODES[strtolower(trim($code))]);
    }
}

PHP);

write($target . '/Relators.php', classHeader('Relators', SOURCES['relators'])
    . "    public const CODES = [\n" . exportMap($relators) . "\n    ];\n\n"
    . <<<'PHP'
    public static function term(string $code): ?string
    {
        return self::CODES[strtolower(trim($code))] ?? null;
    }

    public static function code(string $term): ?string
    {
        $needle = strtolower(trim($term));

        foreach (self::CODES as $code => $label) {
            if (strtolower($label) === $needle) {
                return $code;
            }
        }

        return null;
    }

    public static function exists(string $code): bool
    {
        return isset(self::CODES[strtolower(trim($code))]);
    }
}

PHP);

write($target . '/Countries.php', classHeader('Countries', SOURCES['countries'])
    . "    public const CODES = [\n" . exportMap($countries) . "\n    ];\n\n"
    . <<<'PHP'
    public static function name(string $code): ?string
    {
        return self::CODES[self::clean($code)]['name'] ?? null;
    }

    public static function iso3166(string $code): ?string
    {
        return self::CODES[self::clean($code)]['iso'] ?? null;
    }

    public static function exists(string $code): bool
    {
        return isset(self::CODES[self::clean($code)]);
    }

    private static function clean(string $code): string
    {
        return rtrim(strtolower(trim($code)));
    }
}

PHP);

printf(
    "languages %d, relators %d, countries %d (%d without ISO: %s)\n",
    count($languages),
    count($relators),
    count($countries),
    count($unmapped),
    implode(' ', $unmapped),
);
