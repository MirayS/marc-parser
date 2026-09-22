<?php

declare(strict_types=1);

namespace MirayS\Marc\Tests\Unit;

use MirayS\Marc\Record\ControlField;
use MirayS\Marc\Record\DataField;
use MirayS\Marc\Record\MaterialType;
use MirayS\Marc\Record\Record;
use MirayS\Marc\Record\Subfield;
use PHPUnit\Framework\TestCase;

final class RecordTest extends TestCase
{
    public function testQueryApi(): void
    {
        $record = new Record('00000nam a2200000 c 4500', [
            new ControlField('001', '1271041383'),
            new ControlField('008', '221024s2023    gw ||||| |||| 00||||ger  '),
            new DataField('020', ' ', ' ', [new Subfield('a', '9783423148665'), new Subfield('c', 'Broschur')]),
            new DataField('245', '1', '0', [new Subfield('a', 'Der Fall'), new Subfield('b', 'Roman')]),
        ]);

        self::assertSame('1271041383', $record->getId());
        self::assertTrue($record->has('245'));
        self::assertFalse($record->has('100'));
        self::assertSame('9783423148665', $record->firstSubfield('020', 'a'));
        self::assertSame(['Der Fall'], $record->subfieldValues('245', 'a'));
        self::assertCount(2, $record->getDataFields());
        self::assertCount(2, $record->getControlFields());
        self::assertSame('Roman', $record->getDataField('245')?->subfield('b'));
        self::assertSame('Der Fall Roman', $record->getDataField('245')?->concat('ab'));
    }

    public function testLeaderView(): void
    {
        $leader = (new Record('00000nam a2200000 c 4500'))->getLeader();

        self::assertSame('n', $leader->getRecordStatus());
        self::assertSame('a', $leader->getTypeOfRecord());
        self::assertSame('m', $leader->getBibliographicLevel());
        self::assertTrue($leader->isUnicode());
        self::assertTrue($leader->isMonograph());
        self::assertTrue($leader->isLanguageMaterial());
        self::assertFalse($leader->isDeleted());
        self::assertSame(MaterialType::Books, $leader->getMaterialType());
    }

    public function testSerialLeaderResolvesToContinuingResources(): void
    {
        $leader = (new Record('00000nas a2200000 c 4500'))->getLeader();

        self::assertSame(MaterialType::ContinuingResources, $leader->getMaterialType());
        self::assertFalse($leader->isMonograph());
    }

    public function testFixedField008ForBooks(): void
    {
        $record = new Record('00000nam a2200000 c 4500', [
            new ControlField('008', '221024s2023    gw ||||| |||| 00||||ger  '),
        ]);

        $field = $record->getFixedField008();

        self::assertNotNull($field);
        self::assertSame('221024', $field->getDateEnteredOnFile());
        self::assertSame('s', $field->getTypeOfDate());
        self::assertSame('2023', $field->getDate1());
        self::assertNull($field->getDate2());
        self::assertSame('gw', $field->getPlaceOfPublication());
        self::assertSame('ger', $field->getLanguage());
        self::assertSame(MaterialType::Books, $field->getMaterialType());
    }

    public function testFixedField008ForMusicUsesItsOwnPositions(): void
    {
        $record = new Record('00000ncm a2200000 c 4500', [
            new ControlField('008', '850101s1985    xxu           n    eng  '),
        ]);

        $field = $record->getFixedField008();

        self::assertNotNull($field);
        self::assertSame(MaterialType::Music, $field->getMaterialType());
        self::assertArrayHasKey('formOfComposition', $field->positions());
        self::assertArrayNotHasKey('literaryForm', $field->positions());
    }

    public function testFixedField007(): void
    {
        $record = new Record('00000nam a2200000 c 4500', [
            new ControlField('007', 'cr||||||||||||'),
        ]);

        $field = $record->getFixedFields007()[0];

        self::assertSame('c', $field->getCategoryOfMaterial());
        self::assertSame('r', $field->getSpecificMaterialDesignation());
        self::assertTrue($field->isOnlineResource());
    }

    public function testFixedField006UsesFormOfMaterial(): void
    {
        $record = new Record('00000nam a2200000 c 4500', [
            new ControlField('006', 'm        d        '),
        ]);

        $field = $record->getFixedFields006()[0];

        self::assertSame(MaterialType::ComputerFiles, $field->getMaterialType());
        self::assertSame('m', $field->getFormOfMaterial());
    }
}
