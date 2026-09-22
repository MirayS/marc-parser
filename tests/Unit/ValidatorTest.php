<?php

declare(strict_types=1);

namespace MirayS\Marc\Tests\Unit;

use MirayS\Marc\CodeList\Countries;
use MirayS\Marc\CodeList\Fields;
use MirayS\Marc\CodeList\Languages;
use MirayS\Marc\CodeList\Relators;
use MirayS\Marc\Issue\Issue;
use MirayS\Marc\Record\ControlField;
use MirayS\Marc\Record\DataField;
use MirayS\Marc\Record\Record;
use MirayS\Marc\Record\Subfield;
use MirayS\Marc\Validation\Validator;
use PHPUnit\Framework\TestCase;

final class ValidatorTest extends TestCase
{
    public function testAcceptsAValidRecord(): void
    {
        $record = new Record('00000nam a2200000 c 4500', [
            new ControlField('001', '1'),
            new ControlField('008', '221024s2023    gw ||||| |||| 00||||ger  '),
            new DataField('020', ' ', ' ', [new Subfield('a', '9783423148665')]),
            new DataField('100', '1', ' ', [new Subfield('a', 'Zander, Judith'), new Subfield('4', 'aut')]),
            new DataField('245', '1', '0', [new Subfield('a', 'Johnny Ohneland')]),
        ]);

        self::assertSame([], (new Validator())->validate($record));
    }

    public function testFindsStructuralProblems(): void
    {
        $record = new Record('00000nam a2200000 c 4500', [
            new ControlField('008', 'too short'),
            new DataField('123', ' ', ' ', [new Subfield('a', 'undefined')]),
            new DataField('245', '1', '0', [new Subfield('a', 'One'), new Subfield('a', 'Two'), new Subfield('ä', 'x')]),
            new DataField('245', '1', '0', [new Subfield('a', 'Second 245')]),
        ]);

        $types = array_map(static fn (Issue $issue): string => $issue->type, (new Validator())->validate($record));

        self::assertContains(Issue::INVALID_VALUE, $types);
        self::assertContains(Issue::UNKNOWN_TAG, $types);
        self::assertContains(Issue::NOT_REPEATABLE, $types);
        self::assertContains(Issue::UNKNOWN_SUBFIELD, $types);
    }

    public function testFindsUnknownCodeListValues(): void
    {
        $record = new Record('00000nam a2200000 c 4500', [
            new DataField('041', ' ', ' ', [new Subfield('a', 'zzz')]),
            new DataField('100', '1', ' ', [new Subfield('a', 'Name'), new Subfield('4', 'zzz')]),
            new DataField('044', ' ', ' ', [new Subfield('a', 'zz')]),
        ]);

        $issues = (new Validator())->validate($record);
        $types = array_map(static fn (Issue $issue): string => $issue->type, $issues);

        self::assertSame([Issue::UNKNOWN_CODE, Issue::UNKNOWN_CODE, Issue::UNKNOWN_CODE], $types);
    }

    public function testAcceptsLocallyDefinedFieldsAndSubfields(): void
    {
        $record = new Record('00000nam a2200000 c 4500', [
            new DataField('926', ' ', ' ', [new Subfield('a', 'FBB')]),
            new DataField('020', ' ', ' ', [new Subfield('a', '9783423148665'), new Subfield('9', 'local')]),
            new DataField('773', '0', ' ', [new Subfield('t', 'Host title'), new Subfield('w', '(DE-101)123')]),
        ]);

        self::assertSame([], (new Validator())->validate($record));
    }

    public function testCodeListsCoverTheStandard(): void
    {
        self::assertGreaterThan(400, count(Languages::CODES));
        self::assertGreaterThan(300, count(Relators::CODES));
        self::assertGreaterThan(300, count(Countries::CODES));
        self::assertGreaterThan(230, count(Fields::TAGS));
        self::assertTrue(Fields::exists('776'));
        self::assertTrue(Fields::isLocal('945'));
        self::assertFalse(Fields::isLocal('490'));

        self::assertSame('German', Languages::name('ger'));
        self::assertSame('author', Relators::term('aut'));
        self::assertSame('aut', Relators::code('Author'));
        self::assertSame('Germany', Countries::name('gw'));
        self::assertSame('DE', Countries::iso3166('gw'));
        self::assertSame('US', Countries::iso3166('cau'));
        self::assertSame('Title Statement', Fields::label('245'));
        self::assertFalse(Fields::isRepeatable('245'));
        self::assertTrue(Fields::isRepeatable('020'));
        self::assertSame('Title', Fields::subfieldLabel('245', 'a'));
        self::assertTrue(Fields::subfieldExists('880', '6'));
    }
}
