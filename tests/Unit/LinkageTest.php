<?php

declare(strict_types=1);

namespace MirayS\Marc\Tests\Unit;

use MirayS\Marc\Bibliographic\Bibliographic;
use MirayS\Marc\Record\DataField;
use MirayS\Marc\Record\Leader;
use MirayS\Marc\Record\Linkage;
use MirayS\Marc\Record\Record;
use MirayS\Marc\Record\Subfield;
use PHPUnit\Framework\TestCase;

final class LinkageTest extends TestCase
{
    public function testParsesSubfield6(): void
    {
        $linkage = Linkage::fromSubfield('245-01/Cyrl');

        self::assertNotNull($linkage);
        self::assertSame('245', $linkage->tag);
        self::assertSame('01', $linkage->occurrence);
        self::assertSame('Cyrl', $linkage->script);
        self::assertNull($linkage->orientation);
        self::assertFalse($linkage->isUnlinked());
        self::assertSame('245-01/Cyrl', (string) $linkage);

        $rightToLeft = Linkage::fromSubfield('245-02/(2/r');

        self::assertNotNull($rightToLeft);
        self::assertSame('(2', $rightToLeft->script);
        self::assertTrue($rightToLeft->isRightToLeft());

        self::assertTrue((string) Linkage::fromSubfield('880-00') !== '' && Linkage::fromSubfield('880-00')?->isUnlinked());
        self::assertNull(Linkage::fromSubfield('nonsense'));
    }

    public function testPairsFieldsWithTheirAlternateGraphicRepresentation(): void
    {
        $record = $this->record();
        $title = $record->getDataField('245');

        self::assertNotNull($title);

        $alternates = $record->getAlternateGraphics($title);

        self::assertCount(1, $alternates);
        self::assertSame('Весна священная', $alternates[0]->subfield('a'));
        self::assertSame('Cyrl', $alternates[0]->getLinkage()?->script);
        self::assertSame('Vesna sviashchennaia', $record->getLinkedField($alternates[0])?->subfield('a'));
        self::assertSame('Весна священная', Bibliographic::of($record)->titleOriginalScript());
    }

    public function testListsEveryPairAndLeavesUnlinkedFieldsOut(): void
    {
        $record = $this->record();
        $pairs = $record->getScriptPairs();

        self::assertCount(2, $pairs);
        self::assertSame(['100', '245'], array_map(static fn (array $pair): string => $pair[0]->getTag(), $pairs));

        $unlinked = $record->getUnlinkedAlternateGraphics();

        self::assertCount(1, $unlinked);
        self::assertSame('Примечание', $unlinked[0]->subfield('a'));
    }

    public function testFieldWithoutLinkageHasNoAlternates(): void
    {
        $record = $this->record();
        $isbn = $record->getDataField('020');

        self::assertNotNull($isbn);
        self::assertSame([], $record->getAlternateGraphics($isbn));
        self::assertNull($record->getLinkedField($isbn));
    }

    private function record(): Record
    {
        return new Record(Leader::DEFAULT, [
            new DataField('020', ' ', ' ', [new Subfield('a', '9785170123456')]),
            new DataField('100', '1', ' ', [new Subfield('6', '880-02'), new Subfield('a', 'Stravinskii, Igor')]),
            new DataField('245', '1', '0', [new Subfield('6', '880-01'), new Subfield('a', 'Vesna sviashchennaia')]),
            new DataField('880', '1', '0', [new Subfield('6', '245-01/Cyrl'), new Subfield('a', 'Весна священная')]),
            new DataField('880', '1', ' ', [new Subfield('6', '100-02/Cyrl'), new Subfield('a', 'Стравинский, Игорь')]),
            new DataField('880', ' ', ' ', [new Subfield('6', '500-00/Cyrl'), new Subfield('a', 'Примечание')]),
        ]);
    }
}
