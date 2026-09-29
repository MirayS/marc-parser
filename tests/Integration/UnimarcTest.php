<?php

declare(strict_types=1);

namespace MirayS\Marc\Tests\Integration;

use MirayS\Marc\Bibliographic\Contributor;
use MirayS\Marc\Reader\MarcXmlReader;
use MirayS\Marc\Record\Record;
use MirayS\Marc\Unimarc\Bibliographic;
use MirayS\Marc\Unimarc\Relators;
use PHPUnit\Framework\TestCase;

final class UnimarcTest extends TestCase
{
    private const FIXTURES = __DIR__ . '/../fixtures/';

    /** @var array<string, Record> */
    private array $records = [];

    protected function setUp(): void
    {
        foreach ((new MarcXmlReader())->read(self::FIXTURES . 'bnf-sru.xml') as $record) {
            $this->records[(string) $record->getId()] = $record;
        }
    }

    public function testReadsMarcXchangeRecordsFromAnSruResponse(): void
    {
        $reader = new MarcXmlReader();
        $records = iterator_to_array($reader->read(self::FIXTURES . 'bnf-sru.xml'));

        self::assertCount(5, $records);
        self::assertSame([], $reader->getIssues());
        self::assertSame('     nam  22      n 450 ', $records[0]->getRawLeader());
        self::assertSame('Plonévez-Porzay', $records[0]->firstSubfield('214', 'a'));
    }

    public function testReadsTheCoreDescription(): void
    {
        $book = Bibliographic::of($this->records['FRBNF488301680000003']);

        self::assertSame(['9782493992253'], $book->isbn13s());
        self::assertSame('Regards libres', $book->title());
        self::assertSame('poètes russophones contemporains', $book->subtitle());
        self::assertSame('Regards libres: poètes russophones contemporains', $book->titleLong());
        self::assertSame('Vibration Éditions', $book->publisher());
        self::assertSame('Plonévez-Porzay', $book->placeOfPublication());
        self::assertSame('2026', $book->publicationDate());
        self::assertSame(['fre'], $book->languageCodes());
        self::assertSame('FR', $book->countryCode());
        self::assertSame('1 volume 178 p', $book->extent());
        self::assertSame('22 cm', $book->dimensions());
        self::assertSame([['title' => 'Poésie bilingue', 'number' => '26']], $book->seriesStatements());
        self::assertStringStartsWith('Le vers libre est une forme poétique', $book->summaries()[0]);
        self::assertSame('50', $book->characterSet());
        self::assertTrue($book->isLanguageMaterial());
        self::assertTrue($book->isMonograph());
        self::assertFalse($book->isOnlineResource());
    }

    public function testKeepsThePriceAndQualifierOfEachIsbn(): void
    {
        $book = Bibliographic::of($this->records['FRBNF488301680000003']);
        $field = $book->isbnField('9782493992253');

        self::assertSame('20 EUR', $field?->subfield('d'));
        self::assertSame('br', $field?->subfield('b'));
        self::assertSame(['978-2-493992-01-7'], $book->invalidIsbns());
    }

    public function testSkipsTheManufacturerAndKeepsEveryPublisher(): void
    {
        $book = Bibliographic::of($this->records['FRBNF456480360000003']);

        self::assertSame(['9786071656698', '9786079444433', '9786076055342'], $book->isbn13s());
        self::assertSame('Fondo de Cultura Económica', $book->publisher());
        self::assertCount(3, $book->publishers());
        self::assertSame('2018', $book->date1());
        self::assertSame('d', $book->dateType());
        self::assertSame(['861.7'], $book->dewey());
        self::assertSame(['Poésie mexicaine'], array_map('strval', $book->subjects()));
    }

    public function testFallsBackToTheContentFormWhenTheLeaderHasNoType(): void
    {
        $book = Bibliographic::of($this->records['FRBNF456480360000003']);

        self::assertSame(' ', $book->typeOfRecord());
        self::assertTrue($book->isLanguageMaterial());
        self::assertFalse($book->isMonograph());
    }

    public function testMapsRelatorCodesAndPrimaryResponsibility(): void
    {
        $author = Bibliographic::of($this->records['FRBNF485370310000001'])->contributors()[0];

        self::assertSame('Strnadová, Anna', $author->name);
        self::assertSame(['aut'], $author->relatorCodes);
        self::assertSame('1950-...', $author->dates);
        self::assertTrue($author->isMain());
        self::assertTrue($author->isPersonal());
        self::assertTrue($author->isAuthor());
        self::assertSame(['891.8636'], Bibliographic::of($this->records['FRBNF485370310000001'])->dewey());
    }

    public function testReadsRoleWordsOfPrePublicationRecords(): void
    {
        $contributors = Bibliographic::of($this->records['FRBNF488301680000003'])->contributors();
        $authors = array_map(
            static fn (Contributor $contributor): string => $contributor->name,
            array_values(array_filter($contributors, static fn (Contributor $contributor): bool => $contributor->isAuthor())),
        );

        self::assertSame(['Traducteur'], $contributors[0]->relatorTerms);
        self::assertFalse($contributors[0]->isMain());
        self::assertSame(['Aleksandrovna, Nina', 'Alyokhin, Alekseï', 'Bonch-Osmolovskaya, Tatiana'], $authors);
    }

    public function testTreatsAnUnqualifiedPrimaryNameAsTheAuthor(): void
    {
        $book = Bibliographic::of($this->records['FRBNF488392740000007']);

        self::assertSame(['Debecker, Benoît'], array_map(static fn (Contributor $contributor): string => $contributor->name, $book->authors()));
        self::assertSame('2026', $book->publicationDate());
        self::assertSame('1 vol. (132 p.)', $book->extent());
    }

    public function testTranslatesRelatorCodes(): void
    {
        self::assertSame('trl', Relators::marcCode('730'));
        self::assertSame('ill', Relators::marcCode('440'));
        self::assertSame('Author', Relators::term('70'));
        self::assertNull(Relators::marcCode('999'));
    }

    public function testKeepsUtf8InMarcXchangeWhoseLeaderHasNoCodingScheme(): void
    {
        $xml = '<record xmlns="info:lc/xmlns/marcxchange-v2" format="UNIMARC" type="Bibliographic">'
            . '<leader>     nam  22        450 </leader>'
            . '<datafield tag="200" ind1="1" ind2=" "><subfield code="a">Éléphants à l\'école</subfield></datafield></record>';

        $records = iterator_to_array((new MarcXmlReader())->readString($xml));

        self::assertCount(1, $records);
        self::assertSame('Éléphants à l\'école', Bibliographic::of($records[0])->title());
    }
}
