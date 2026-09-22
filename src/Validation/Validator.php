<?php

declare(strict_types=1);

namespace MirayS\Marc\Validation;

use MirayS\Marc\CodeList\Countries;
use MirayS\Marc\CodeList\Fields;
use MirayS\Marc\CodeList\Languages;
use MirayS\Marc\CodeList\Relators;
use MirayS\Marc\Issue\Issue;
use MirayS\Marc\Record\ControlField;
use MirayS\Marc\Record\DataField;
use MirayS\Marc\Record\FixedField008;
use MirayS\Marc\Record\Leader;
use MirayS\Marc\Record\Record;

final class Validator
{
    public function __construct(private readonly bool $checkCodeLists = true)
    {
    }

    /**
     * @return list<Issue>
     */
    public function validate(Record $record): array
    {
        $issues = [];
        $id = $record->getId();

        if (strlen($record->getRawLeader()) !== Leader::LENGTH) {
            $issues[] = new Issue(Issue::INVALID_LEADER, 'leader', 'Leader must be 24 bytes', $id);
        }

        $seenTags = [];

        foreach ($record->getFields() as $field) {
            $tag = $field->getTag();
            $seenTags[$tag] = ($seenTags[$tag] ?? 0) + 1;

            if (!Fields::exists($tag)) {
                if (!Fields::isLocal($tag)) {
                    $issues[] = new Issue(Issue::UNKNOWN_TAG, $tag, 'Tag is not defined in MARC 21 bibliographic', $id);
                }

                continue;
            }

            if ($seenTags[$tag] === 2 && Fields::isRepeatable($tag) === false) {
                $issues[] = new Issue(Issue::NOT_REPEATABLE, $tag, 'Field is not repeatable', $id);
            }

            if ($field instanceof ControlField) {
                $issues = array_merge($issues, $this->validateControlField($field, $id));

                continue;
            }

            if ($field instanceof DataField) {
                $issues = array_merge($issues, $this->validateDataField($field, $id));
            }
        }

        return $issues;
    }

    /**
     * @return list<Issue>
     */
    private function validateControlField(ControlField $field, ?string $id): array
    {
        $issues = [];
        $tag = $field->getTag();
        $length = strlen($field->getValue());

        if ($tag === '008' && $length !== FixedField008::LENGTH) {
            $issues[] = new Issue(
                Issue::INVALID_VALUE,
                '008',
                sprintf('Field 008 is %d bytes long, expected %d', $length, FixedField008::LENGTH),
                $id,
            );
        }

        if ($tag === '007' && $length < 2) {
            $issues[] = new Issue(Issue::INVALID_VALUE, '007', 'Field 007 is shorter than two bytes', $id);
        }

        return $issues;
    }

    /**
     * @return list<Issue>
     */
    private function validateDataField(DataField $field, ?string $id): array
    {
        $issues = [];
        $tag = $field->getTag();
        $seen = [];
        $anySubfield = Fields::acceptsAnySubfield($tag);

        foreach ([$field->getIndicator1(), $field->getIndicator2()] as $number => $indicator) {
            if (strlen($indicator) !== 1) {
                $issues[] = new Issue(
                    Issue::INVALID_INDICATOR,
                    sprintf('%s/ind%d', $tag, $number + 1),
                    'Indicator must be exactly one character',
                    $id,
                );
            }
        }

        foreach ($field->getSubfields() as $subfield) {
            $code = $subfield->getCode();
            $seen[$code] = ($seen[$code] ?? 0) + 1;
            $path = $tag . '$' . $code;

            if (!Fields::subfieldExists($tag, $code)) {
                if (!Fields::isLocalSubfield($code) && !Fields::acceptsAnySubfield($tag)) {
                    $issues[] = new Issue(Issue::UNKNOWN_SUBFIELD, $path, 'Subfield is not defined for this field', $id);
                }

                continue;
            }

            if (!$anySubfield && $seen[$code] === 2 && Fields::isSubfieldRepeatable($tag, $code) === false) {
                $issues[] = new Issue(Issue::NOT_REPEATABLE, $path, 'Subfield is not repeatable', $id);
            }

            if ($subfield->getValue() === '') {
                $issues[] = new Issue(Issue::EMPTY_SUBFIELD, $path, 'Subfield is empty', $id);
            }

            if ($this->checkCodeLists) {
                $issues = array_merge($issues, $this->validateCode($tag, $code, $subfield->getValue(), $id));
            }
        }

        return $issues;
    }

    /**
     * @return list<Issue>
     */
    private function validateCode(string $tag, string $code, string $value, ?string $id): array
    {
        $value = trim($value);

        if ($value === '') {
            return [];
        }

        $path = $tag . '$' . $code;

        if ($code === '4' && in_array($tag, ['100', '110', '111', '700', '710', '711'], true)) {
            $relator = strtolower(rtrim($value, '.'));

            if (strlen($relator) === 3 && !Relators::exists($relator)) {
                return [new Issue(Issue::UNKNOWN_CODE, $path, sprintf('Unknown relator code %s', $value), $id)];
            }

            return [];
        }

        if ($tag === '041' && in_array($code, ['a', 'b', 'd', 'e', 'f', 'g', 'h', 'j'], true)) {
            foreach (str_split($value, 3) as $language) {
                if (strlen($language) === 3 && !Languages::exists($language)) {
                    return [new Issue(Issue::UNKNOWN_CODE, $path, sprintf('Unknown language code %s', $language), $id)];
                }
            }

            return [];
        }

        if ($tag === '044' && $code === 'a' && !Countries::exists($value)) {
            return [new Issue(Issue::UNKNOWN_CODE, $path, sprintf('Unknown country code %s', $value), $id)];
        }

        return [];
    }
}
