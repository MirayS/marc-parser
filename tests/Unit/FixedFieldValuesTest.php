<?php

declare(strict_types=1);

namespace MirayS\Marc\Tests\Unit;

use MirayS\Marc\CodeList\FixedFields;
use MirayS\Marc\Issue\Issue;
use MirayS\Marc\Record\ControlField;
use MirayS\Marc\Record\Record;
use MirayS\Marc\Validation\Validator;
use PHPUnit\Framework\TestCase;

final class FixedFieldValuesTest extends TestCase
{
    public function testDescribesCodedPositions(): void
    {
        $record = new Record('00000nam a2200000 c 4500', [
            new ControlField('007', 'cr||||||||||||'),
            new ControlField('008', '221024s2023    gw ||||| |||| 00||||ger  '),
        ]);

        $fixed = $record->getFixedField008();

        self::assertNotNull($fixed);
        self::assertSame('Single known date/probable date', $fixed->describe('typeOfDate'));
        self::assertSame('Type of date/Publication status', $fixed->label('typeOfDate'));
        self::assertSame('No attempt to code', $fixed->describe('literaryForm'));
        self::assertArrayHasKey('f', $fixed->values('literaryForm'));
        self::assertSame('Novels', $fixed->values('literaryForm')['f']);

        $leader = $record->getLeader();

        self::assertSame('Language material', $leader->describe('typeOfRecord'));
        self::assertSame('Monograph/item', $leader->describe('bibliographicLevel'));

        $physical = $record->getFixedFields007()[0];

        self::assertSame('Computer file', $physical->describe('categoryOfMaterial'));
        self::assertSame('Remote', $physical->describe('specificMaterialDesignation'));
    }

    public function testPositionsComeFromTheStandard(): void
    {
        self::assertSame(
            ['offset' => 33, 'length' => 1],
            array_intersect_key(
                FixedFields::positions('bibliographic', '008', 'BK')['literaryForm'],
                ['offset' => 0, 'length' => 0],
            ),
        );

        self::assertSame('Running time for motion pictures and videorecordings', FixedFields::label('bibliographic', '008', 'VM', 'runningTimeForMotionPicturesAndVideorecordings'));
        self::assertSame('Established heading', FixedFields::valueLabel('authority', '008', 'ALL', 'kindOfRecord', 'a'));
        self::assertNotSame([], FixedFields::positions('holdings', '008', 'ALL'));
        self::assertCount(15, FixedFields::BLOCKS['bibliographic']['007']);
    }

    public function testValidatorReportsUndefinedCodes(): void
    {
        $record = new Record('00000Xam a2200000 c 4500', [
            new ControlField('008', '221024Q2023    gw ||||| |||| 00||||ger  '),
        ]);

        $issues = (new Validator())->validate($record);
        $paths = array_map(static fn (Issue $issue): string => $issue->path, $issues);

        self::assertContains('leader/05', $paths);
        self::assertContains('008/06', $paths);
        self::assertSame([], (new Validator(checkFixedFields: false))->validate($record));
    }
}
