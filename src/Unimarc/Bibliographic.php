<?php

declare(strict_types=1);

namespace MirayS\Marc\Unimarc;

use MirayS\Marc\Bibliographic\Classification;
use MirayS\Marc\Bibliographic\Contributor;
use MirayS\Marc\Bibliographic\Isbn;
use MirayS\Marc\Bibliographic\Link;
use MirayS\Marc\Bibliographic\Punctuation;
use MirayS\Marc\Bibliographic\Subject;
use MirayS\Marc\CodeList\Languages;
use MirayS\Marc\Record\DataField;
use MirayS\Marc\Record\Record;

final class Bibliographic
{
    private const PUBLICATION_FUNCTIONS = [' ', '0'];

    private const SUBJECT_TAGS = ['600', '601', '602', '604', '605', '606', '607', '608', '615', '616', '617'];

    private const JUVENILE_AUDIENCES = ['a', 'b', 'c', 'd', 'e'];

    private const DATE_PREFIXES = '/^(?:DL|D\.L\.|cop\.|copyright|impr\.|c|©|p|℗)\s*/iu';

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

        foreach ($this->record->getDataFields('010') as $field) {
            foreach ($field->subfieldValues('a') as $value) {
                $isbn = Isbn::normalize($value);

                if ($isbn !== null) {
                    $isbns[$isbn] = $isbn;
                }
            }
        }

        foreach ($this->record->getDataFields('073') as $field) {
            foreach ($field->subfieldValues('a') as $value) {
                $isbn = Isbn::normalize($value);

                if ($isbn !== null && (str_starts_with($isbn, '978') || str_starts_with($isbn, '979'))) {
                    $isbns[$isbn] = $isbn;
                }
            }
        }

        return array_values($isbns);
    }

    public function isbnField(string $isbn13): ?DataField
    {
        foreach ($this->record->getDataFields('010') as $field) {
            foreach ($field->subfieldValues('a') as $value) {
                if (Isbn::normalize($value) === $isbn13) {
                    return $field;
                }
            }
        }

        return null;
    }

    /**
     * @return list<string>
     */
    public function invalidIsbns(): array
    {
        $values = [];

        foreach ($this->record->getDataFields('010') as $field) {
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

        foreach ($this->record->getDataFields('011') as $field) {
            foreach ($field->subfieldValues('a') as $value) {
                $values[] = trim($value);
            }
        }

        return $values;
    }

    public function ean(): ?string
    {
        $value = $this->record->firstSubfield('073', 'a');

        return $value === null ? null : trim($value);
    }

    public function title(): ?string
    {
        $titles = $this->record->getDataField('200')?->subfieldValues('a') ?? [];
        $titles = array_values(array_filter(array_map(Punctuation::strip(...), $titles), static fn (string $title): bool => $title !== ''));

        return $titles === [] ? null : implode(' ; ', $titles);
    }

    public function subtitle(): ?string
    {
        $values = $this->record->getDataField('200')?->subfieldValues('e') ?? [];
        $values = array_values(array_filter(array_map(Punctuation::strip(...), $values), static fn (string $value): bool => $value !== ''));

        return $values === [] ? null : implode(' : ', $values);
    }

    public function titleLong(): ?string
    {
        $field = $this->record->getDataField('200');

        if ($field === null) {
            return null;
        }

        $title = '';

        foreach ($field->getSubfields('aehi') as $subfield) {
            $value = Punctuation::strip($subfield->getValue());

            if ($value === '') {
                continue;
            }

            if ($title === '') {
                $title = $value;

                continue;
            }

            $title .= match ($subfield->getCode()) {
                'a' => ' ; ' . $value,
                'e' => ': ' . $value,
                'h', 'i' => '. ' . $value,
                default => ' ' . $value,
            };
        }

        return $title === '' ? null : $title;
    }

    public function statementOfResponsibility(): ?string
    {
        $values = $this->record->getDataField('200')?->subfieldValues('f') ?? [];
        $values = array_values(array_filter(array_map(Punctuation::strip(...), $values), static fn (string $value): bool => $value !== ''));

        return $values === [] ? null : implode(' ; ', $values);
    }

    /**
     * @return list<string>
     */
    public function alternativeTitles(): array
    {
        $titles = [];

        foreach ($this->record->getDataFields('500', '510', '512', '513', '514', '515', '516', '517', '518', '532', '540', '541') as $field) {
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

        foreach ($this->record->getDataFields('700', '701', '702', '710', '711', '712', '720', '721', '722') as $field) {
            $tag = $field->getTag();
            $corporate = in_array($tag, ['710', '711', '712'], true);
            $name = $corporate ? $this->corporateName($field) : $this->personalName($field);

            if ($name === null) {
                continue;
            }

            $relatorCodes = [];

            foreach ($field->subfieldValues('4') as $code) {
                $relatorCodes[] = Relators::marcCode($code) ?? strtolower(trim($code));
            }

            $contributors[] = new Contributor(
                $name,
                $tag,
                array_values(array_unique($relatorCodes)),
                $corporate ? [] : array_map(Punctuation::strip(...), $field->subfieldValues('c')),
                $field->subfield('f') === null ? null : Punctuation::strip((string) $field->subfield('f')),
                [...$field->subfieldValues('3'), ...$field->subfieldValues('o')],
                in_array($tag, ['700', '710', '720'], true),
                match (true) {
                    $corporate && $field->getIndicator1() === '1' => Contributor::MEETING,
                    $corporate => Contributor::CORPORATE,
                    default => Contributor::PERSONAL,
                },
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
        $value = $this->publication('c');

        return $value === null ? null : Punctuation::strip($value);
    }

    /**
     * @return list<string>
     */
    public function publishers(): array
    {
        $values = [];

        foreach ($this->publicationFields() as $field) {
            foreach ($field->subfieldValues('c') as $value) {
                $value = Punctuation::strip($value);

                if ($value !== '') {
                    $values[$value] = $value;
                }
            }
        }

        return array_values($values);
    }

    public function placeOfPublication(): ?string
    {
        $value = $this->publication('a');

        return $value === null ? null : Punctuation::stripBrackets(Punctuation::strip($value));
    }

    public function publicationDate(): ?string
    {
        $value = $this->publication('d');
        $date = $value === null ? null : $this->cleanDate($value);

        return $date ?? $this->date1();
    }

    public function dateType(): ?string
    {
        $value = $this->generalProcessingData(8, 1);

        return $value === null || trim($value) === '' ? null : $value;
    }

    public function date1(): ?string
    {
        $value = $this->generalProcessingData(9, 4);

        return $value !== null && preg_match('/^\d{4}$/', $value) === 1 ? $value : null;
    }

    public function date2(): ?string
    {
        $value = $this->generalProcessingData(13, 4);

        return $value !== null && preg_match('/^\d{4}$/', $value) === 1 ? $value : null;
    }

    public function isDateApproximate(): bool
    {
        return in_array($this->dateType(), ['f', 'u'], true);
    }

    public function originalPublicationDate(): ?string
    {
        return $this->dateType() === 'e' ? $this->date2() : null;
    }

    /**
     * @return list<string>
     */
    public function targetAudienceCodes(): array
    {
        $value = $this->generalProcessingData(17, 3);

        if ($value === null) {
            return [];
        }

        return array_values(array_filter(str_split($value), static fn (string $code): bool => $code !== ' ' && $code !== '|' && $code !== 'u'));
    }

    public function isJuvenile(): bool
    {
        return array_intersect($this->targetAudienceCodes(), self::JUVENILE_AUDIENCES) !== [];
    }

    public function characterSet(): ?string
    {
        $value = $this->generalProcessingData(26, 4);

        return $value === null || trim($value) === '' ? null : trim($value);
    }

    public function countryCode(): ?string
    {
        foreach ($this->record->subfieldValues('102', 'a') as $code) {
            $code = strtoupper(trim($code));

            if (preg_match('/^[A-Z]{2}$/', $code) === 1 && $code !== 'XX' && $code !== 'ZZ') {
                return $code;
            }
        }

        return null;
    }

    /**
     * @return list<string>
     */
    public function languageCodes(): array
    {
        $codes = [];

        foreach ($this->record->subfieldValues('101', 'a') as $value) {
            $code = strtolower(trim($value));

            if (preg_match('/^[a-z]{3}$/', $code) === 1 && !in_array($code, ['und', 'mul', 'zxx'], true)) {
                $codes[$code] = $code;
            }
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

    /**
     * @return list<string>
     */
    public function originalLanguageCodes(): array
    {
        $codes = [];

        foreach ($this->record->subfieldValues('101', 'c') as $value) {
            $code = strtolower(trim($value));

            if (preg_match('/^[a-z]{3}$/', $code) === 1) {
                $codes[$code] = $code;
            }
        }

        return array_values($codes);
    }

    public function isTranslation(): bool
    {
        return $this->record->getDataField('101')?->getIndicator1() === '1';
    }

    public function edition(): ?string
    {
        $value = $this->record->firstSubfield('205', 'a');

        return $value === null ? null : Punctuation::strip($value);
    }

    public function extent(): ?string
    {
        $value = $this->record->firstSubfield('215', 'a');

        return $value === null ? null : Punctuation::strip($value);
    }

    public function physicalDetails(): ?string
    {
        $value = $this->record->firstSubfield('215', 'c');

        return $value === null ? null : Punctuation::strip($value);
    }

    public function dimensions(): ?string
    {
        $value = $this->record->firstSubfield('215', 'd');

        return $value === null ? null : Punctuation::strip($value);
    }

    public function accompanyingMaterial(): ?string
    {
        $value = $this->record->firstSubfield('215', 'e');

        return $value === null ? null : Punctuation::strip($value);
    }

    /**
     * @return list<string>
     */
    public function series(): array
    {
        return array_map(static fn (array $series): string => $series['title'], $this->seriesStatements());
    }

    /**
     * @return list<array{title: string, number: string|null}>
     */
    public function seriesStatements(): array
    {
        $series = [];

        foreach ($this->record->getDataFields('225') as $field) {
            $title = $field->subfield('a');

            if ($title === null || ($title = Punctuation::strip($title)) === '') {
                continue;
            }

            $number = $field->subfield('v');
            $series[mb_strtolower($title)] = ['title' => $title, 'number' => $number === null ? null : Punctuation::strip($number)];
        }

        foreach ($this->record->getDataFields('410') as $field) {
            $title = $field->subfield('t');

            if ($title === null || ($title = Punctuation::strip($title)) === '' || isset($series[mb_strtolower($title)])) {
                continue;
            }

            $number = $field->subfield('v');
            $series[mb_strtolower($title)] = ['title' => $title, 'number' => $number === null ? null : Punctuation::strip($number)];
        }

        return array_values($series);
    }

    /**
     * @return list<string>
     */
    public function summaries(): array
    {
        $summaries = [];

        foreach ($this->record->getDataFields('330') as $field) {
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
            if (!str_starts_with($field->getTag(), '3')) {
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
        $value = $this->record->firstSubfield('333', 'a');

        return $value === null ? null : trim($value);
    }

    /**
     * @return list<Subject>
     */
    public function subjects(): array
    {
        $subjects = [];

        foreach ($this->record->getDataFields(...self::SUBJECT_TAGS) as $field) {
            $heading = $field->subfield('a');

            if ($heading === null) {
                continue;
            }

            $heading = Punctuation::strip($heading);

            if (in_array($field->getTag(), ['600', '602'], true) && ($forename = $field->subfield('b')) !== null) {
                $heading .= ', ' . Punctuation::strip($forename);
            }

            $subdivisions = [];

            foreach ($field->getSubfields('jxyz') as $subfield) {
                $subdivisions[] = Punctuation::strip($subfield->getValue());
            }

            $subjects[] = new Subject($heading, $field->getTag(), $subdivisions, $field->subfield('2'));
        }

        return $subjects;
    }

    /**
     * @return list<string>
     */
    public function keywords(): array
    {
        return array_map(Punctuation::strip(...), $this->record->subfieldValues('610', 'a'));
    }

    /**
     * @return list<string>
     */
    public function genres(): array
    {
        return array_map(Punctuation::strip(...), $this->record->subfieldValues('608', 'a'));
    }

    /**
     * @return list<string>
     */
    public function dewey(): array
    {
        $values = [];

        foreach ($this->record->getDataFields('676') as $field) {
            foreach ($field->subfieldValues('a') as $value) {
                $value = trim((string) preg_replace('/\s*\([^)]*\)\s*$/u', '', $value));
                $value = str_replace(['/', '\\', "'", ' '], '', $value);

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
    public function udc(): array
    {
        $values = [];

        foreach ($this->record->subfieldValues('675', 'a') as $value) {
            $value = trim($value);

            if ($value !== '') {
                $values[$value] = $value;
            }
        }

        return array_values($values);
    }

    /**
     * @return list<Classification>
     */
    public function classifications(?string $scheme = null): array
    {
        $classifications = [];

        foreach ($this->record->getDataFields('675', '676', '680', '686') as $field) {
            $fieldScheme = match ($field->getTag()) {
                '675' => 'udc',
                '676' => 'ddc',
                '680' => 'lcc',
                default => $field->subfield('2'),
            };

            if ($scheme !== null && $fieldScheme !== $scheme) {
                continue;
            }

            foreach ($field->subfieldValues('a') as $code) {
                $classifications[] = new Classification(
                    trim($code),
                    $field->getTag(),
                    $fieldScheme,
                    $field->subfield('v'),
                    $field->subfield('c'),
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
                    $field->subfield('y') ?? $field->subfield('b'),
                    $field->subfield('z'),
                    $field->getIndicator2() === ' ' ? null : $field->getIndicator2(),
                );
            }
        }

        return $links;
    }

    /**
     * @return list<string>
     */
    public function contentTypes(): array
    {
        return array_values(array_unique(array_map('trim', $this->record->subfieldValues('181', 'c'))));
    }

    /**
     * @return list<string>
     */
    public function mediaTypes(): array
    {
        return array_values(array_unique(array_map('trim', $this->record->subfieldValues('182', 'c'))));
    }

    /**
     * @return list<string>
     */
    public function carrierTypes(): array
    {
        return array_values(array_unique(array_map('trim', $this->record->subfieldValues('183', 'a'))));
    }

    public function typeOfRecord(): string
    {
        return $this->record->getLeader()->getTypeOfRecord();
    }

    public function bibliographicLevel(): string
    {
        return $this->record->getLeader()->getBibliographicLevel();
    }

    public function isMonograph(): bool
    {
        return $this->bibliographicLevel() === 'm';
    }

    public function isLanguageMaterial(): bool
    {
        if (trim($this->typeOfRecord()) !== '') {
            return in_array($this->typeOfRecord(), ['a', 'b'], true);
        }

        return in_array('txt', $this->contentTypes(), true) || str_starts_with((string) $this->record->firstSubfield('181', 'a'), 'i');
    }

    public function isDeleted(): bool
    {
        return $this->record->getLeader()->isDeleted();
    }

    public function isOnlineResource(): bool
    {
        if ($this->typeOfRecord() === 'l' || in_array('c', $this->mediaTypes(), true)) {
            return true;
        }

        return array_intersect($this->carrierTypes(), ['ceb', 'cr']) !== [];
    }

    public function isAudio(): bool
    {
        return in_array($this->typeOfRecord(), ['i', 'j'], true) || in_array('s', $this->mediaTypes(), true);
    }

    public function lastModified(): ?string
    {
        $value = $this->record->getControlValue('005');

        if ($value === null || preg_match('/^(\d{4})(\d{2})(\d{2})(\d{2})(\d{2})(\d{2})/', $value, $matches) !== 1) {
            return null;
        }

        return sprintf('%s-%s-%sT%s:%s:%sZ', $matches[1], $matches[2], $matches[3], $matches[4], $matches[5], $matches[6]);
    }

    public function relatorTerm(string $code): ?string
    {
        return Relators::term($code);
    }

    private function generalProcessingData(int $offset, int $length): ?string
    {
        $value = $this->record->firstSubfield('100', 'a');

        if ($value === null || strlen($value) < $offset + $length) {
            return null;
        }

        return substr($value, $offset, $length);
    }

    /**
     * @return list<DataField>
     */
    private function publicationFields(): array
    {
        $fields = array_values(array_filter(
            $this->record->getDataFields('214'),
            static fn (DataField $field): bool => in_array($field->getIndicator2(), self::PUBLICATION_FUNCTIONS, true),
        ));

        return [...$fields, ...$this->record->getDataFields('210')];
    }

    private function publication(string $code): ?string
    {
        foreach ($this->publicationFields() as $field) {
            $value = $field->subfield($code);

            if ($value !== null && trim($value) !== '') {
                return $value;
            }
        }

        return null;
    }

    private function personalName(DataField $field): ?string
    {
        $surname = $field->subfield('a');

        if ($surname === null || ($surname = Punctuation::strip($surname)) === '') {
            return null;
        }

        $forename = $field->subfield('b');
        $forename = $forename === null ? '' : Punctuation::strip($forename);
        $numeration = $field->subfield('d');
        $numeration = $numeration === null ? '' : Punctuation::strip($numeration);

        $name = $forename === '' ? $surname : $surname . ', ' . $forename;

        return trim($numeration === '' ? $name : $name . ' ' . $numeration);
    }

    private function corporateName(DataField $field): ?string
    {
        $parts = [];

        foreach ($field->getSubfields('abcd') as $subfield) {
            $value = Punctuation::strip($subfield->getValue());

            if ($value === '') {
                continue;
            }

            $parts[] = in_array($subfield->getCode(), ['c', 'd'], true) ? '(' . $value . ')' : $value;
        }

        $name = trim(preg_replace('/\s+\(/u', ' (', implode('. ', $parts)) ?? '');
        $name = str_replace('. (', ' (', $name);

        return $name === '' ? null : $name;
    }

    private function cleanDate(string $value): ?string
    {
        $value = Punctuation::stripBrackets(Punctuation::strip($value));
        $value = preg_replace(self::DATE_PREFIXES, '', $value) ?? $value;
        $value = trim($value);

        return $value === '' ? null : $value;
    }
}
