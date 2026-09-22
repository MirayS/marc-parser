<?php

declare(strict_types=1);

namespace MirayS\Marc\Validation;

use MirayS\Marc\CodeList\Countries;
use MirayS\Marc\CodeList\Dictionary;
use MirayS\Marc\CodeList\Languages;
use MirayS\Marc\CodeList\Relators;
use MirayS\Marc\CodeList\Vocabularies;
use MirayS\Marc\Issue\Issue;
use MirayS\Marc\Record\CodedField;
use MirayS\Marc\Record\ControlField;
use MirayS\Marc\Record\DataField;
use MirayS\Marc\Record\FixedField008;
use MirayS\Marc\Record\Leader;
use MirayS\Marc\Record\Record;

final class Validator
{
    public function __construct(
        private readonly bool $checkCodeLists = true,
        private readonly bool $checkIndicators = true,
        private readonly bool $checkFixedFields = true,
    ) {
    }

    /**
     * @return list<Issue>
     */
    public function validate(Record $record): array
    {
        $issues = [];
        $id = $record->getId();
        $dictionary = Dictionary::for($record->getLeader()->getRecordFormat());

        if (strlen($record->getRawLeader()) !== Leader::LENGTH) {
            $issues[] = new Issue(Issue::INVALID_LEADER, 'leader', 'Leader must be 24 bytes', $id);
        }

        if ($this->checkFixedFields) {
            $issues = array_merge($issues, $this->validateCodedField($record->getLeader(), 'leader', $id));

            foreach ($record->getFixedFields006() as $field) {
                $issues = array_merge($issues, $this->validateCodedField($field, '006', $id));
            }

            foreach ($record->getFixedFields007() as $field) {
                $issues = array_merge($issues, $this->validateCodedField($field, '007', $id));
            }

            $fixed = $record->getFixedField008();

            if ($fixed !== null) {
                $issues = array_merge($issues, $this->validateCodedField($fixed, '008', $id));
            }
        }

        $seenTags = [];

        foreach ($record->getFields() as $field) {
            $tag = $field->getTag();
            $seenTags[$tag] = ($seenTags[$tag] ?? 0) + 1;

            if ($dictionary === null) {
                if ($field instanceof ControlField) {
                    $issues = array_merge($issues, $this->validateControlField($field, $id));
                }

                continue;
            }

            if (!$dictionary->exists($tag)) {
                if (!$dictionary->isLocal($tag)) {
                    $issues[] = new Issue(Issue::UNKNOWN_TAG, $tag, 'Tag is not defined in MARC 21 bibliographic', $id);
                }

                continue;
            }

            if ($seenTags[$tag] === 2 && $dictionary->isRepeatable($tag) === false) {
                $issues[] = new Issue(Issue::NOT_REPEATABLE, $tag, 'Field is not repeatable', $id);
            }

            if ($field instanceof ControlField) {
                $issues = array_merge($issues, $this->validateControlField($field, $id));

                continue;
            }

            if ($field instanceof DataField) {
                $issues = array_merge($issues, $this->validateDataField($field, $dictionary, $id));
            }
        }

        return $issues;
    }

    /**
     * @return list<Issue>
     */
    private function validateCodedField(CodedField $field, string $path, ?string $id): array
    {
        $issues = [];

        foreach ($field->definitions() as $name => $definition) {
            if ($definition['values'] === []) {
                continue;
            }

            $value = $field->get($name);

            if ($value === null || $definition['length'] > 1) {
                continue;
            }

            if (!isset($definition['values'][$value])) {
                $issues[] = new Issue(
                    Issue::UNKNOWN_CODE,
                    sprintf('%s/%02d', $path, $definition['offset']),
                    sprintf(
                        'Value %s is not defined for %s',
                        $value === ' ' ? 'blank' : $value,
                        $definition['label'],
                    ),
                    $id,
                );
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
    private function validateDataField(DataField $field, Dictionary $dictionary, ?string $id): array
    {
        $issues = [];
        $tag = $field->getTag();
        $seen = [];
        $anySubfield = $dictionary->acceptsAnySubfield($tag);


        foreach ([$field->getIndicator1(), $field->getIndicator2()] as $number => $indicator) {
            $position = $number + 1;
            $path = sprintf('%s/ind%d', $tag, $position);

            if (strlen($indicator) !== 1) {
                $issues[] = new Issue(Issue::INVALID_INDICATOR, $path, 'Indicator must be exactly one character', $id);

                continue;
            }

            if (!$this->checkIndicators || $anySubfield) {
                continue;
            }

            if ($dictionary->indicatorIsDefined($tag, $position, $indicator) === false) {
                $issues[] = new Issue(
                    Issue::INVALID_INDICATOR,
                    $path,
                    sprintf(
                        'Indicator value %s is not defined for %s',
                        $indicator === ' ' ? 'blank' : $indicator,
                        $dictionary->indicatorLabel($tag, $position) ?? $tag,
                    ),
                    $id,
                );
            }
        }

        foreach ($field->getSubfields() as $subfield) {
            $code = $subfield->getCode();
            $seen[$code] = ($seen[$code] ?? 0) + 1;
            $path = $tag . '$' . $code;

            if (!$dictionary->subfieldExists($tag, $code)) {
                if (!$dictionary->isLocalSubfield($code) && !$anySubfield) {
                    $issues[] = new Issue(Issue::UNKNOWN_SUBFIELD, $path, 'Subfield is not defined for this field', $id);
                }

                continue;
            }

            if (!$anySubfield && $seen[$code] === 2 && $dictionary->isSubfieldRepeatable($tag, $code) === false) {
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

        if ($tag === '043' && $code === 'a' && !Vocabularies::exists(Vocabularies::GEOGRAPHIC_AREAS, rtrim($value, '-'))) {
            return [new Issue(Issue::UNKNOWN_CODE, $path, sprintf('Unknown geographic area code %s', $value), $id)];
        }

        $list = $this->listFor($tag, $code);

        if ($list !== null && !Vocabularies::exists($list, $value)) {
            return [new Issue(
                Issue::UNKNOWN_CODE,
                $path,
                sprintf('%s is not in the %s list', $value, Vocabularies::description($list) ?? $list),
                $id,
            )];
        }

        return [];
    }

    private function listFor(string $tag, string $code): ?string
    {
        if ($code === '2') {
            if ($tag === '655') {
                return Vocabularies::GENRE_FORM_SCHEMES;
            }

            if (str_starts_with($tag, '6')) {
                return Vocabularies::SUBJECT_SCHEMES;
            }

            if (in_array($tag, ['084', '086'], true)) {
                return Vocabularies::CLASSIFICATION_SCHEMES;
            }

            return null;
        }

        if ($tag === '040' && $code === 'e') {
            return Vocabularies::DESCRIPTION_CONVENTIONS;
        }

        if ($code !== 'b') {
            return null;
        }

        return match ($tag) {
            '336' => Vocabularies::CONTENT_TYPES,
            '337' => Vocabularies::MEDIA_TYPES,
            '338' => Vocabularies::CARRIERS,
            default => null,
        };
    }
}
