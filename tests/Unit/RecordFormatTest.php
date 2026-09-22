<?php

declare(strict_types=1);

namespace MirayS\Marc\Tests\Unit;

use MirayS\Marc\CodeList\AuthorityFields;
use MirayS\Marc\CodeList\Dictionary;
use MirayS\Marc\CodeList\HoldingsFields;
use MirayS\Marc\Record\ControlField;
use MirayS\Marc\Record\DataField;
use MirayS\Marc\Record\Record;
use MirayS\Marc\Record\RecordFormat;
use MirayS\Marc\Record\Subfield;
use MirayS\Marc\Validation\Validator;
use PHPUnit\Framework\TestCase;

final class RecordFormatTest extends TestCase
{
    public function testRecognisesEveryFormatFromTheLeader(): void
    {
        self::assertSame(RecordFormat::Bibliographic, RecordFormat::fromLeader('a'));
        self::assertSame(RecordFormat::Authority, RecordFormat::fromLeader('z'));
        self::assertSame(RecordFormat::Holdings, RecordFormat::fromLeader('x'));
        self::assertSame(RecordFormat::Holdings, RecordFormat::fromLeader('v'));
        self::assertSame(RecordFormat::Classification, RecordFormat::fromLeader('w'));
        self::assertSame(RecordFormat::CommunityInformation, RecordFormat::fromLeader('q'));
    }

    public function testAuthorityFixedFieldUsesItsOwnPositions(): void
    {
        $record = new Record('00000nz  a2200000n  4500', [
            new ControlField('008', '860211n| azannaabn          |n aaa      '),
        ]);

        $field = $record->getFixedField008();

        self::assertNotNull($field);
        self::assertSame(RecordFormat::Authority, $field->getRecordFormat());
        self::assertSame('860211', $field->get('dateEnteredOnFile'));
        self::assertSame('a', $field->get('kindOfRecord'));
        self::assertSame('n', $field->get('numberedOrUnnumberedSeries'));
        self::assertArrayNotHasKey('literaryForm', $field->positions());
        self::assertArrayNotHasKey('date1', $field->positions());
    }

    public function testHoldingsFixedFieldUsesItsOwnPositions(): void
    {
        $record = new Record('00000nx  a22000001  4500', [
            new ControlField('008', '9808107u    8   4001uueng0000000'),
        ]);

        $field = $record->getFixedField008();

        self::assertNotNull($field);
        self::assertSame(RecordFormat::Holdings, $field->getRecordFormat());
        self::assertSame('980810', $field->get('dateEnteredOnFile'));
        self::assertSame('7', $field->get('receiptOrAcquisitionStatus'));
        self::assertSame('eng', $field->get('language'));
    }

    public function testDictionaryFollowsTheRecordFormat(): void
    {
        self::assertSame('MARC 21 Authority', Dictionary::for(RecordFormat::Authority)?->format);
        self::assertSame('MARC 21 Holdings', Dictionary::for(RecordFormat::Holdings)?->format);
        self::assertSame('MARC 21 Bibliographic', Dictionary::for(RecordFormat::Bibliographic)?->format);
        self::assertNull(Dictionary::for(RecordFormat::Classification));

        self::assertSame('Heading--personal name', AuthorityFields::label('100'));
        self::assertSame('See from tracing--personal name', AuthorityFields::label('400'));
        self::assertSame('Location', HoldingsFields::label('852'));
        self::assertTrue(HoldingsFields::subfieldExists('866', 'a'));
    }

    public function testValidatorUsesTheRightDictionary(): void
    {
        $authority = new Record('00000nz  a2200000n  4500', [
            new ControlField('001', '1'),
            new DataField('100', '1', ' ', [new Subfield('a', 'Zander, Judith')]),
            new DataField('400', '1', ' ', [new Subfield('a', 'Zander, J.')]),
        ]);

        self::assertSame([], (new Validator())->validate($authority));

        $bibliographic = new Record('00000nam a2200000 c 4500', [
            new ControlField('001', '1'),
            new DataField('400', '1', ' ', [new Subfield('a', 'Zander, J.')]),
        ]);

        $issues = (new Validator())->validate($bibliographic);

        self::assertCount(1, $issues);
        self::assertSame('unknown_tag', $issues[0]->type);
    }
}
