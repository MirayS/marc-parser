<?php

declare(strict_types=1);

namespace MirayS\Marc\Tests\Integration;

use DOMDocument;
use DOMElement;
use MirayS\Marc\Bibliographic\Bibliographic;
use MirayS\Marc\Reader\MarcXmlReader;
use PHPUnit\Framework\TestCase;

final class MarcXmlReaderTest extends TestCase
{
    private const FIXTURES = __DIR__ . '/../fixtures/';

    public function testReadsRecordWrappedInSruResponse(): void
    {
        $reader = new MarcXmlReader();
        $records = iterator_to_array($reader->read(self::FIXTURES . 'dnb-sru.xml'));

        self::assertCount(1, $records);
        self::assertSame(1, $reader->getRecordCount());
        self::assertSame([], $reader->getIssues());

        $record = $records[0];

        self::assertSame('1271041383', $record->getId());
        self::assertSame('00000pam a2200000 c 4500', $record->getRawLeader());
        self::assertSame('DE-101', $record->getControlValue('003'));
        self::assertSame('9783423148665', $record->firstSubfield('020', 'a'));
        self::assertSame('1', $record->getDataField('245')?->getIndicator1());
    }

    public function testReadsEveryRecordOfAnOaiPage(): void
    {
        $reader = new MarcXmlReader();
        $records = iterator_to_array($reader->read(self::FIXTURES . 'dnb-oai.xml'));

        self::assertCount(5, $records);
        self::assertSame('1420051687', $records[0]->getId());
        self::assertSame([], $reader->getIssues());
    }

    public function testFromDomElementParsesASingleOaiMetadataElement(): void
    {
        $document = new DOMDocument();
        $document->load(self::FIXTURES . 'dnb-oai.xml');
        $elements = $document->getElementsByTagNameNS(MarcXmlReader::NAMESPACE, 'record');
        $element = $elements->item(0);

        self::assertInstanceOf(DOMElement::class, $element);

        $reader = new MarcXmlReader();
        $record = $reader->fromDomElement($element);

        self::assertSame('1420051687', $record->getId());
        self::assertSame(1, $reader->getRecordCount());
    }

    public function testCapturesRawXmlOnDemand(): void
    {
        $reader = new MarcXmlReader(captureRawXml: true);

        foreach ($reader->read(self::FIXTURES . 'loc-sru.xml') as $record) {
            self::assertSame('22158200', $record->getId());
            self::assertStringContainsString('<controlfield tag="001">22158200</controlfield>', (string) $reader->getRecordRawXml());
        }
    }

    public function testNormalisesDecomposedUnicode(): void
    {
        $xml = '<record xmlns="http://www.loc.gov/MARC21/slim"><leader>00000nam a2200000 c 4500</leader>'
            . '<datafield tag="245" ind1="1" ind2="0"><subfield code="a">Mu&#x0308;nchen</subfield></datafield></record>';

        $records = iterator_to_array((new MarcXmlReader())->readString($xml));
        $raw = iterator_to_array((new MarcXmlReader(normalize: false))->readString($xml));

        self::assertSame('München', $records[0]->firstSubfield('245', 'a'));
        self::assertSame(7, mb_strlen((string) $records[0]->firstSubfield('245', 'a')));
        self::assertSame(8, mb_strlen((string) $raw[0]->firstSubfield('245', 'a')));
    }

    public function testReportsIssuesWithoutThrowing(): void
    {
        $xml = '<record xmlns="http://www.loc.gov/MARC21/slim"><leader>short</leader>'
            . '<datafield tag="245" ind1="12" ind2="0"><subfield code="a"></subfield></datafield></record>';

        $reader = new MarcXmlReader();
        iterator_to_array($reader->readString($xml));

        $types = array_map(static fn ($issue): string => $issue->type, $reader->getIssues());

        self::assertContains('invalid_leader', $types);
        self::assertContains('invalid_indicator', $types);
        self::assertContains('empty_subfield', $types);
    }

    public function testBibliographicShortcutsOnTheLocRecord(): void
    {
        $records = iterator_to_array((new MarcXmlReader())->read(self::FIXTURES . 'loc-sru.xml'));
        $book = Bibliographic::of($records[0]);

        self::assertSame(['9780262046305'], $book->isbn13s());
        self::assertSame('Introduction to algorithms', $book->title());
        self::assertSame('Fourth edition', $book->edition());
        self::assertSame('The MIT Press', $book->publisher());
        self::assertSame('2022', $book->publicationDate());
        self::assertSame('xx, 1291 pages', $book->extent());
        self::assertSame('24 cm', $book->dimensions());
        self::assertSame(['eng'], $book->languageCodes());
        self::assertSame('US', $book->countryCode());
        self::assertSame(['005.13'], $book->dewey());
        self::assertStringStartsWith('"The leading introductory textbook', $book->summaries()[0]);
        self::assertTrue($book->isMonograph());
        self::assertTrue($book->isLanguageMaterial());
        self::assertFalse($book->isDeleted());
        self::assertFalse($book->isOnlineResource());
        self::assertSame(
            ['Cormen, Thomas H.', 'Leiserson, Charles Eric', 'Rivest, Ronald L.', 'Stein, Clifford'],
            array_map(static fn ($contributor): string => $contributor->name, $book->authors()),
        );
    }

    public function testBibliographicShortcutsOnTheDnbRecord(): void
    {
        $records = iterator_to_array((new MarcXmlReader())->read(self::FIXTURES . 'dnb-sru.xml'));
        $book = Bibliographic::of($records[0]);

        self::assertSame(['9783423148665'], $book->isbn13s());
        self::assertSame('Johnny Ohneland', $book->title());
        self::assertSame('Johnny Ohneland: Roman', $book->titleLong());
        self::assertSame('dtv', $book->publisher());
        self::assertSame('München', $book->placeOfPublication());
        self::assertSame('2023', $book->publicationDate());
        self::assertSame('gw', $book->placeOfPublicationCode());
        self::assertSame('DE', $book->countryCode());
        self::assertSame('Germany', $book->countryName());
        self::assertSame(['ger'], $book->languageCodes());
        self::assertSame('German', $book->languageName());
        self::assertSame('525 Seiten', $book->extent());
        self::assertSame('20 cm, 374 g', $book->dimensions());
        self::assertSame('2023-08-02T22:03:30Z', $book->lastModified());

        $author = $book->authors()[0];

        self::assertSame('Zander, Judith', $author->name);
        self::assertSame(['aut'], $author->relatorCodes);
        self::assertTrue($author->isPersonal());
        self::assertTrue($author->isMain());
        self::assertContains('(Produktform)Paperback / softback', $book->keywords());
    }

    public function testOnlineResourceDetection(): void
    {
        $records = iterator_to_array((new MarcXmlReader())->read(self::FIXTURES . 'dnb-oai.xml'));
        $book = Bibliographic::of($records[0]);

        self::assertTrue($book->isOnlineResource());
        self::assertSame('cr', $book->carrierType());
        self::assertNotSame([], $book->links());
    }
}
