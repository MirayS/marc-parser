<?php

declare(strict_types=1);

namespace MirayS\Marc\Bibliographic;

use MirayS\Marc\CodeList\Countries;
use MirayS\Marc\CodeList\Languages;
use MirayS\Marc\CodeList\Relators;
use MirayS\Marc\Record\DataField;
use MirayS\Marc\Record\FixedField007;
use MirayS\Marc\Record\FixedField008;
use MirayS\Marc\Record\Record;

final class Bibliographic
{
    public function __construct(private readonly Record $record)
    {
    }

    public static function of(Record $record): self
    {
        return new self($record);
    }

    public function getRecord(): Record
    {
        return $this->record;
    }

    public function id(): ?string
    {
        return $this->record->getId();
    }

    /**
     * @return list<string>
     */
    public function isbn13s(): array
    {
        $isbns = [];

        foreach ($this->record->getDataFields('020') as $field) {
            foreach ($field->subfieldValues('a') as $value) {
                $isbn = Isbn::normalize($value);

                if ($isbn !== null) {
                    $isbns[$isbn] = $isbn;
                }
            }
        }

        foreach ($this->record->getDataFields('024') as $field) {
            if ($field->getIndicator1() !== '3') {
                continue;
            }

            foreach ($field->subfieldValues('a') as $value) {
                $isbn = Isbn::normalize($value);

                if ($isbn !== null) {
                    $isbns[$isbn] = $isbn;
                }
            }
        }

        return array_values($isbns);
    }

    /**
     * @return list<string>
     */
    public function invalidIsbns(): array
    {
        $values = [];

        foreach ($this->record->getDataFields('020') as $field) {
            foreach ($field->subfieldValues('z') as $value) {
                $values[] = trim($value);
            }
        }

        return $values;
    }

    /**
     * @return list<string>
     */
    public function issns(): array
    {
        $values = [];

        foreach ($this->record->getDataFields('022') as $field) {
            foreach ($field->subfieldValues('a') as $value) {
                $values[] = trim($value);
            }
        }

        return $values;
    }

    public function ean(): ?string
    {
        foreach ($this->record->getDataFields('024') as $field) {
            if ($field->getIndicator1() === '3' && $field->subfield('a') !== null) {
                return trim((string) $field->subfield('a'));
            }
        }

        return null;
    }

    public function title(): ?string
    {
        $field = $this->record->getDataField('245');
        $title = $field?->subfield('a');

        return $title === null ? null : Punctuation::strip($title);
    }

    public function titleLong(): ?string
    {
        $field = $this->record->getDataField('245');

        if ($field === null) {
            return null;
        }

        $title = $this->joinTitle($field);

        return $title === '' ? null : $title;
    }

    public function statementOfResponsibility(): ?string
    {
        $value = $this->record->getDataField('245')?->subfield('c');

        return $value === null ? null : Punctuation::strip($value);
    }

    /**
     * @return list<string>
     */
    public function alternativeTitles(): array
    {
        $titles = [];

        foreach ($this->record->getDataFields('130', '210', '222', '240', '242', '246', '247') as $field) {
            $value = $field->subfield('a');

            if ($value !== null) {
                $titles[] = Punctuation::strip($value);
            }
        }

        return $titles;
    }

    /**
     * @return list<Contributor>
     */
    public function contributors(): array
    {
        $contributors = [];

        foreach ($this->record->getDataFields('100', '110', '111', '700', '710', '711') as $field) {
            $name = $this->contributorName($field);

            if ($name === null) {
                continue;
            }

            $contributors[] = new Contributor(
                $name,
                $field->getTag(),
                array_map(
                    static fn (string $code): string => strtolower(trim(rtrim($code, '.'))),
                    $field->subfieldValues('4'),
                ),
                array_map(
                    static fn (string $term): string => Punctuation::strip($term),
                    $field->subfieldValues('e'),
                ),
                $field->subfield('d') === null ? null : Punctuation::strip((string) $field->subfield('d')),
                $field->subfieldValues('01'),
            );
        }

        return $contributors;
    }

    /**
     * @return list<Contributor>
     */
    public function authors(): array
    {
        return array_values(array_filter(
            $this->contributors(),
            static fn (Contributor $contributor): bool => $contributor->isAuthor(),
        ));
    }

    public function publisher(): ?string
    {
        foreach ($this->record->getDataFields('264') as $field) {
            if ($field->getIndicator2() === '1' && $field->subfield('b') !== null) {
                return Punctuation::strip((string) $field->subfield('b'));
            }
        }

        $value = $this->record->firstSubfield('260', 'b');

        return $value === null ? null : Punctuation::strip($value);
    }

    public function placeOfPublication(): ?string
    {
        foreach ($this->record->getDataFields('264') as $field) {
            if ($field->getIndicator2() === '1' && $field->subfield('a') !== null) {
                return Punctuation::stripBrackets(Punctuation::strip((string) $field->subfield('a')));
            }
        }

        $value = $this->record->firstSubfield('260', 'a');

        return $value === null ? null : Punctuation::stripBrackets(Punctuation::strip($value));
    }

    public function publicationDate(): ?string
    {
        foreach ($this->record->getDataFields('264') as $field) {
            if ($field->getIndicator2() === '1' && $field->subfield('c') !== null) {
                $date = $this->cleanDate((string) $field->subfield('c'));

                if ($date !== null) {
                    return $date;
                }
            }
        }

        $value = $this->record->firstSubfield('260', 'c');
        $date = $value === null ? null : $this->cleanDate($value);

        return $date ?? $this->fixedField008()?->getDate1();
    }

    public function copyrightDate(): ?string
    {
        foreach ($this->record->getDataFields('264') as $field) {
            if ($field->getIndicator2() === '4' && $field->subfield('c') !== null) {
                return $this->cleanDate((string) $field->subfield('c'));
            }
        }

        return null;
    }

    public function placeOfPublicationCode(): ?string
    {
        return $this->fixedField008()?->getPlaceOfPublication();
    }

    public function countryCode(): ?string
    {
        $code = $this->placeOfPublicationCode();

        return $code === null ? null : Countries::iso3166($code);
    }

    public function countryName(): ?string
    {
        $code = $this->placeOfPublicationCode();

        return $code === null ? null : Countries::name($code);
    }

    /**
     * @return list<string>
     */
    public function languageCodes(): array
    {
        $codes = [];

        foreach ($this->record->getDataFields('041') as $field) {
            foreach ($field->subfieldValues('a') as $value) {
                foreach (str_split(trim($value), 3) as $code) {
                    $code = strtolower(trim($code));

                    if (strlen($code) === 3) {
                        $codes[$code] = $code;
                    }
                }
            }
        }

        $fixed = $this->fixedField008()?->getLanguage();

        if ($fixed !== null && strlen($fixed) === 3) {
            $codes[strtolower($fixed)] = strtolower($fixed);
        }

        return array_values($codes);
    }

    public function languageCode(): ?string
    {
        return $this->languageCodes()[0] ?? null;
    }

    public function languageName(): ?string
    {
        $code = $this->languageCode();

        return $code === null ? null : Languages::name($code);
    }

    public function edition(): ?string
    {
        $value = $this->record->firstSubfield('250', 'a');

        return $value === null ? null : Punctuation::strip($value);
    }

    public function extent(): ?string
    {
        $value = $this->record->firstSubfield('300', 'a');

        return $value === null ? null : Punctuation::strip($value);
    }

    public function physicalDetails(): ?string
    {
        $value = $this->record->firstSubfield('300', 'b');

        return $value === null ? null : Punctuation::strip($value);
    }

    public function dimensions(): ?string
    {
        $value = $this->record->firstSubfield('300', 'c');

        return $value === null ? null : Punctuation::strip($value);
    }

    /**
     * @return list<string>
     */
    public function series(): array
    {
        $series = [];

        foreach ($this->record->getDataFields('490', '440', '830', '800', '810', '811') as $field) {
            $value = $field->subfield('a');

            if ($value !== null) {
                $series[] = Punctuation::strip($value);
            }
        }

        return $series;
    }

    /**
     * @return list<string>
     */
    public function summaries(): array
    {
        $summaries = [];

        foreach ($this->record->getDataFields('520') as $field) {
            foreach ($field->subfieldValues('a') as $value) {
                $summaries[] = trim($value);
            }
        }

        return $summaries;
    }

    /**
     * @return list<string>
     */
    public function notes(): array
    {
        $notes = [];

        foreach ($this->record->getDataFields() as $field) {
            if (!str_starts_with($field->getTag(), '5')) {
                continue;
            }

            $value = $field->subfield('a');

            if ($value !== null) {
                $notes[] = trim($value);
            }
        }

        return $notes;
    }

    public function targetAudienceNote(): ?string
    {
        $value = $this->record->firstSubfield('521', 'a');

        return $value === null ? null : trim($value);
    }

    /**
     * @return list<Subject>
     */
    public function subjects(): array
    {
        $subjects = [];

        foreach ($this->record->getDataFields() as $field) {
            if (!str_starts_with($field->getTag(), '6')) {
                continue;
            }

            $heading = $field->subfield('a');

            if ($heading === null) {
                continue;
            }

            $subdivisions = [];

            foreach ($field->getSubfields('vxyz') as $subfield) {
                $subdivisions[] = Punctuation::strip($subfield->getValue());
            }

            $subjects[] = new Subject(
                Punctuation::strip($heading),
                $field->getTag(),
                $subdivisions,
                $field->subfield('2'),
            );
        }

        return $subjects;
    }

    /**
     * @return list<string>
     */
    public function keywords(): array
    {
        return array_map(
            static fn (string $value): string => Punctuation::strip($value),
            $this->record->subfieldValues('653', 'a'),
        );
    }

    /**
     * @return list<string>
     */
    public function genres(): array
    {
        return array_map(
            static fn (string $value): string => Punctuation::strip($value),
            $this->record->subfieldValues('655', 'a'),
        );
    }

    /**
     * @return list<string>
     */
    public function dewey(): array
    {
        $values = [];

        foreach ($this->record->getDataFields('082', '083') as $field) {
            foreach ($field->subfieldValues('a') as $value) {
                $value = str_replace(['/', '\\'], '', trim($value));

                if ($value !== '') {
                    $values[$value] = $value;
                }
            }
        }

        return array_values($values);
    }

    /**
     * @return list<string>
     */
    public function lcClassification(): array
    {
        $values = [];

        foreach ($this->record->getDataFields('050', '090') as $field) {
            $value = $field->concat('ab');

            if ($value !== null) {
                $values[] = trim($value);
            }
        }

        return $values;
    }

    /**
     * @return list<Classification>
     */
    public function classifications(?string $scheme = null): array
    {
        $classifications = [];

        foreach ($this->record->getDataFields('084', '082', '083', '085', '086') as $field) {
            $fieldScheme = $field->subfield('2');

            if ($scheme !== null && $fieldScheme !== $scheme) {
                continue;
            }

            foreach ($field->subfieldValues('a') as $code) {
                $classifications[] = new Classification(
                    trim($code),
                    $field->getTag(),
                    $fieldScheme,
                    $field->subfield('2') === null ? null : $field->getIndicator1(),
                    $field->subfield('x'),
                );
            }
        }

        return $classifications;
    }

    /**
     * @return list<Link>
     */
    public function links(): array
    {
        $links = [];

        foreach ($this->record->getDataFields('856') as $field) {
            foreach ($field->subfieldValues('u') as $url) {
                $links[] = new Link(
                    trim($url),
                    $field->subfield('3'),
                    $field->subfield('q'),
                    $field->subfield('y'),
                    $field->subfield('z'),
                    $field->getIndicator2() === ' ' ? null : $field->getIndicator2(),
                );
            }
        }

        return $links;
    }

    public function contentType(): ?string
    {
        return $this->record->firstSubfield('336', 'b');
    }

    public function mediaType(): ?string
    {
        return $this->record->firstSubfield('337', 'b');
    }

    public function carrierType(): ?string
    {
        return $this->record->firstSubfield('338', 'b');
    }

    public function isMonograph(): bool
    {
        return $this->record->getLeader()->isMonograph();
    }

    public function isLanguageMaterial(): bool
    {
        return $this->record->getLeader()->isLanguageMaterial();
    }

    public function isDeleted(): bool
    {
        return $this->record->getLeader()->isDeleted();
    }

    public function isOnlineResource(): bool
    {
        foreach ($this->record->getFixedFields007() as $field) {
            if ($field->isOnlineResource()) {
                return true;
            }
        }

        return $this->carrierType() === 'cr' || $this->fixedField008()?->getFormOfItem() === 'o';
    }

    public function isAudio(): bool
    {
        foreach ($this->record->getFixedFields007() as $field) {
            if ($field->isSoundRecording()) {
                return true;
            }
        }

        return in_array($this->record->getLeader()->getTypeOfRecord(), ['i', 'j'], true);
    }

    public function lastModified(): ?string
    {
        $value = $this->record->getControlValue('005');

        if ($value === null || preg_match('/^(\d{4})(\d{2})(\d{2})(\d{2})(\d{2})(\d{2})/', $value, $matches) !== 1) {
            return null;
        }

        return sprintf('%s-%s-%sT%s:%s:%sZ', $matches[1], $matches[2], $matches[3], $matches[4], $matches[5], $matches[6]);
    }

    public function fixedField008(): ?FixedField008
    {
        return $this->record->getFixedField008();
    }

    /**
     * @return list<FixedField007>
     */
    public function fixedFields007(): array
    {
        return $this->record->getFixedFields007();
    }

    public function relatorTerm(string $code): ?string
    {
        return Relators::term($code);
    }

    private function joinTitle(DataField $field): string
    {
        $parts = [];

        foreach ($field->getSubfields('abnp') as $subfield) {
            $value = Punctuation::strip($subfield->getValue());

            if ($value === '') {
                continue;
            }

            $parts[] = [$subfield->getCode(), $value];
        }

        $title = '';

        foreach ($parts as $index => [$code, $value]) {
            if ($index === 0) {
                $title = $value;

                continue;
            }

            $title .= match ($code) {
                'b' => ': ' . $value,
                'n' => '. ' . $value,
                'p' => '. ' . $value,
                default => ' ' . $value,
            };
        }

        return $title;
    }

    private function contributorName(DataField $field): ?string
    {
        $name = $field->subfield('a');

        if ($name === null) {
            return null;
        }

        $parts = [Punctuation::strip($name)];

        foreach ($field->getSubfields('bc') as $subfield) {
            $value = Punctuation::strip($subfield->getValue());

            if ($value !== '') {
                $parts[] = $value;
            }
        }

        $joined = trim(implode(' ', $parts));

        return $joined === '' ? null : $joined;
    }

    private function cleanDate(string $value): ?string
    {
        $value = Punctuation::stripBrackets(Punctuation::strip($value));
        $value = preg_replace('/^(c|©|p|℗)\s*/iu', '', $value) ?? $value;
        $value = trim($value);

        return $value === '' ? null : $value;
    }
}
