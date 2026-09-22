<?php

declare(strict_types=1);

namespace MirayS\Marc\Tests\Unit;

use MirayS\Marc\Bibliographic\Bibliographic;
use MirayS\Marc\CodeList\Vocabularies;
use MirayS\Marc\Record\ControlField;
use MirayS\Marc\Record\DataField;
use MirayS\Marc\Record\Record;
use MirayS\Marc\Record\Subfield;
use MirayS\Marc\Validation\Validator;
use PHPUnit\Framework\TestCase;

final class VocabulariesTest extends TestCase
{
    public function testCarriesTheSourceListsOfTheStandard(): void
    {
        self::assertGreaterThan(400, count(Vocabularies::codes(Vocabularies::SUBJECT_SCHEMES)));
        self::assertGreaterThan(200, count(Vocabularies::codes(Vocabularies::CLASSIFICATION_SCHEMES)));
        self::assertGreaterThan(500, count(Vocabularies::codes(Vocabularies::GEOGRAPHIC_AREAS)));

        self::assertSame('text', Vocabularies::label(Vocabularies::CONTENT_TYPES, 'txt'));
        self::assertSame('volume', Vocabularies::label(Vocabularies::CARRIERS, 'nc'));
        self::assertSame('online resource', Vocabularies::label(Vocabularies::CARRIERS, 'cr'));
        self::assertSame('unmediated', Vocabularies::label(Vocabularies::MEDIA_TYPES, 'n'));
        self::assertSame('Germany', Vocabularies::label(Vocabularies::GEOGRAPHIC_AREAS, 'e-gx'));
        self::assertTrue(Vocabularies::exists(Vocabularies::CLASSIFICATION_SCHEMES, 'sdnb'));
        self::assertTrue(Vocabularies::exists(Vocabularies::SUBJECT_SCHEMES, 'gnd'));
        self::assertFalse(Vocabularies::exists(Vocabularies::SUBJECT_SCHEMES, 'not-a-scheme'));
    }

    public function testReadsRdaTermsAndAreasOffARecord(): void
    {
        $record = new Record('00000nam a2200000 c 4500', [
            new ControlField('008', '221024s2023    gw ||||| |||| 00||||ger  '),
            new DataField('040', ' ', ' ', [new Subfield('a', 'DE-101'), new Subfield('e', 'rda')]),
            new DataField('043', ' ', ' ', [new Subfield('a', 'e-gx---')]),
            new DataField('336', ' ', ' ', [new Subfield('b', 'txt'), new Subfield('2', 'rdacontent')]),
            new DataField('337', ' ', ' ', [new Subfield('b', 'n'), new Subfield('2', 'rdamedia')]),
            new DataField('338', ' ', ' ', [new Subfield('b', 'nc'), new Subfield('2', 'rdacarrier')]),
        ]);

        $book = Bibliographic::of($record);

        self::assertSame('text', $book->contentTypeLabel());
        self::assertSame('unmediated', $book->mediaTypeLabel());
        self::assertSame('volume', $book->carrierTypeLabel());
        self::assertSame([['code' => 'e-gx---', 'name' => 'Germany']], $book->geographicAreas());
        self::assertSame('Resource description and access', $book->catalogingConvention());
        self::assertSame([], (new Validator())->validate($record));
    }

    public function testValidatorChecksSchemeCodes(): void
    {
        $record = new Record('00000nam a2200000 c 4500', [
            new DataField('650', ' ', '7', [new Subfield('a', 'Kochen'), new Subfield('2', 'no-such-thesaurus')]),
            new DataField('338', ' ', ' ', [new Subfield('b', 'zz'), new Subfield('2', 'rdacarrier')]),
            new DataField('043', ' ', ' ', [new Subfield('a', 'x-xx---')]),
        ]);

        $issues = (new Validator())->validate($record);

        self::assertCount(3, $issues);
        self::assertSame(['650$2', '338$b', '043$a'], array_map(static fn ($issue): string => $issue->path, $issues));
    }
}
