<?php

declare(strict_types=1);

namespace MirayS\Marc\Encoding;

use MirayS\Marc\CodeList\Marc8Tables;
use MirayS\Marc\Support\Text;

final class Marc8Decoder
{
    private const ESCAPE = 0x1B;

    private const G0_INTERMEDIATE = ['(', ',', '$'];
    private const G1_INTERMEDIATE = [')', '-', '$'];

    private int $g0 = Marc8Tables::BASIC_LATIN;

    private int $g1 = Marc8Tables::ANSEL;

    /** @var list<string> */
    private array $unmapped = [];

    public function decode(string $value): string
    {
        $this->g0 = Marc8Tables::BASIC_LATIN;
        $this->g1 = Marc8Tables::ANSEL;
        $this->unmapped = [];

        if ($value === '') {
            return '';
        }

        $length = strlen($value);
        $output = '';
        $combining = '';
        $position = 0;

        while ($position < $length) {
            if (ord($value[$position]) === self::ESCAPE) {
                $consumed = $this->readEscape($value, $position, $length);

                if ($consumed > 0) {
                    $position += $consumed;

                    continue;
                }
            }

            $multibyte = Marc8Tables::isMultibyte($this->g0);

            if ($multibyte) {
                if ($position + 3 > $length) {
                    $this->unmapped[] = sprintf('truncated multibyte sequence at byte %d', $position);
                    break;
                }

                $code = (ord($value[$position]) << 16) | (ord($value[$position + 1]) << 8) | ord($value[$position + 2]);
                $position += 3;
            } else {
                $code = ord($value[$position]);
                $position++;
            }

            if ($code < 0x20 || ($code > 0x80 && $code < 0xA0)) {
                continue;
            }

            $entry = $multibyte || $code <= 0x80
                ? Marc8Tables::lookup($this->g0, $code)
                : Marc8Tables::lookup($this->g1, $code);

            if ($entry === null) {
                $odd = Marc8Tables::odd($code);

                if ($odd !== null) {
                    $output .= $this->character($odd);

                    continue;
                }

                $this->unmapped[] = sprintf('0x%X in G0=0x%02X G1=0x%02X', $code, $this->g0, $this->g1);
                $output .= ' ';

                continue;
            }

            [$unicode, $isCombining] = $entry;

            if ($isCombining) {
                $combining .= $this->character($unicode);

                continue;
            }

            $output .= $this->character($unicode) . $combining;
            $combining = '';
        }

        return Text::normalize($output . $combining);
    }

    /**
     * @return list<string>
     */
    public function getUnmapped(): array
    {
        return $this->unmapped;
    }

    public static function looksLikeUtf8(string $value): bool
    {
        return $value === '' || mb_check_encoding($value, 'UTF-8');
    }

    private function readEscape(string $value, int $position, int $length): int
    {
        $next = $value[$position + 1] ?? null;

        if ($next === null) {
            return 0;
        }

        if (in_array($next, self::G0_INTERMEDIATE, true) || in_array($next, self::G1_INTERMEDIATE, true)) {
            $offset = $position + 2;

            if ($next === '$' && isset($value[$offset]) && in_array($value[$offset], [',', '-', ')', '('], true)) {
                $designator = $value[$offset] === ',' || $value[$offset] === '(' ? 'g0' : 'g1';
                $offset++;
            } else {
                $designator = in_array($next, self::G1_INTERMEDIATE, true) && $next !== '$' ? 'g1' : 'g0';
            }

            if (!isset($value[$offset])) {
                return 0;
            }

            $charset = ord($value[$offset]);

            if (!Marc8Tables::has($charset)) {
                $this->unmapped[] = sprintf('unknown code set 0x%02X', $charset);
            }

            if ($designator === 'g0') {
                $this->g0 = $charset;
            } else {
                $this->g1 = $charset;
            }

            return $offset - $position + 1;
        }

        $charset = ord($next);

        if (Marc8Tables::has($charset)) {
            $this->g0 = $charset;

            return 2;
        }

        if ($charset === 0x73) {
            $this->g0 = Marc8Tables::BASIC_LATIN;

            return 2;
        }

        return 0;
    }

    private function character(int $codepoint): string
    {
        return (string) mb_chr($codepoint, 'UTF-8');
    }
}
