# PHP MARC 21 Parser

Streaming parser for MARC 21 bibliographic records in all three of their serialisations —
ISO 2709 (`.mrc`), MARCXML and MARC-in-JSON. Reads multi-gigabyte national library dumps in
constant memory, exposes the whole standard (leader, 006/007/008 fixed fields for every
material type, every defined field and subfield), and never aborts a run because of one broken
record.

## Requirements

PHP 8.2+ with `dom`, `libxml`, `xmlreader`, `mbstring` and `json`. `intl` enables Unicode NFC
normalisation, `zlib` and `zip` let the readers open compressed files directly.

## Installation

```
composer require mirays/marc
```

## Reading

The facade picks the serialisation itself — by sniffing the content, then by the extension — so a
path is all it needs:

```php
foreach (\MirayS\Marc\Marc::books('dnb_all_dnbmarc.1.mrc.gz') as $book) {
    echo implode(',', $book->isbn13s()), ' ', $book->title(), PHP_EOL;
}

\MirayS\Marc\Marc::read('oai-page.xml');        // records instead of shortcuts
\MirayS\Marc\Marc::readString($payload);        // same detection over a string
\MirayS\Marc\Marc::detect('dump.ndjson');       // Format::MarcJson
```

Take the reader yourself when you need its counters and issues:

```php
$reader = new \MirayS\Marc\Reader\Iso2709Reader();

foreach ($reader->read('dnb_all_dnbmarc.1.mrc.gz') as $record) {
    $book = \MirayS\Marc\Bibliographic\Bibliographic::of($record);

    echo implode(',', $book->isbn13s()), ' ', $book->title(), PHP_EOL;
}

echo $reader->getRecordCount();
$reader->getIssues();
```

The three readers share one contract — `read()` over a path or stream URI, `readStream()` over an
open resource, `readString()` over an in-memory document, plus `getRecordCount()`, `getIssues()`
and `getRecordIssues()`:

| Reader | Input |
| --- | --- |
| `Reader\Iso2709Reader` | binary `.mrc`, transparently `.gz`, `.bz2`, `.zip` |
| `Reader\MarcXmlReader` | MARCXML anywhere in a document: bare `collection`, SRU `recordData`, OAI-PMH `metadata`; `fromDomElement()` takes one element |
| `Reader\MarcJsonReader` | MARC-in-JSON as NDJSON, as a JSON array, or `readArray()` for one decoded record |

MARC-8 records are transcoded to UTF-8 automatically: when the leader says the record is not
Unicode, every value goes through `Encoding\Marc8Decoder`, which follows the escape sequences of
the standard across all twelve code sets — Basic and Extended Latin, Greek and Greek symbols,
Cyrillic, Hebrew, Arabic, subscripts, superscripts and three-byte EACC — reorders the combining
diacritics MARC-8 writes before their base character, and normalises the result to NFC. Bytes it
cannot map become an `encoding` issue rather than silent mojibake. Pass
`encoding: Encoding::Marc8` or `Encoding::Utf8` to overrule a leader you do not trust.

Nothing throws on malformed data unless the reader is built with `strict: true`; problems land in
`getIssues()` as `Issue` objects (`invalid_leader`, `invalid_directory`, `invalid_indicator`,
`empty_subfield`, `encoding`, `xml_error`, `json_error`). Every value is normalised to Unicode NFC,
which matters for sources such as the DNB that ship NFD.

## Writing

```php
$xml = (new \MirayS\Marc\Writer\MarcXmlWriter())->write($record);
$json = (new \MirayS\Marc\Writer\MarcJsonWriter())->write($record);
$binary = (new \MirayS\Marc\Writer\Iso2709Writer())->write($record);
```

Every pair of formats round-trips to an equal record, and both the binary and the JSON output are
byte-for-byte identical to what pymarc writes for the same input.

ISO 2709 cannot hold a record longer than 99 999 bytes or a field longer than 9 999, so
`Iso2709Writer` refuses those rather than writing a leader or directory that silently lies about
the record; `clampOversized: true` caps them the way some vendors do. MARCXML and MARC-in-JSON
have no such limit.

## The record

`Record` keeps the leader and the fields in document order and answers queries directly:

```php
$record->getId();                       // 001
$record->getControlValue('005');
$record->getDataFields('700');
$record->getDataField('245')?->subfield('a');
$record->subfieldValues('020', 'a');
$record->firstSubfield('260', 'b');
```

Fixed fields come back as typed views whose positions follow the material type derived from the
leader (books, computer files, maps, music, continuing resources, visual and mixed materials):

```php
$record->getLeader()->getEncodingLevel();
$record->getFixedField008()?->getDate1();
$record->getFixedField008()?->get('literaryForm');
$record->getFixedFields007()[0]->isOnlineResource();
$record->getFixedFields006()[0]->getMaterialType();
```

## Records other than bibliographic

The leader decides which format a record is in, and the fixed fields and the dictionary follow it:

```php
$record->getLeader()->getRecordFormat();   // RecordFormat::Authority
$record->getFixedField008()?->get('kindOfRecord');
CodeList\Dictionary::for($record->getLeader()->getRecordFormat());
```

`008` is read with the positions of its own format — bibliographic (per material type), authority
or holdings — and `CodeList\Fields`, `CodeList\AuthorityFields` and `CodeList\HoldingsFields`
carry the three dictionaries. Classification and community information records parse like any
other, but have no dictionary yet, so the validator only checks their structure.

## Scripts and 880

Fields carrying a non-Latin form of another field are linked through `$6`:

```php
$title = $record->getDataField('245');

$record->getAlternateGraphics($title);     // the 880 fields holding the original script
$record->getLinkedField($alternate);       // and back to 245
$record->getScriptPairs();                 // every linked pair in the record
$record->getUnlinkedAlternateGraphics();   // 880s with occurrence 00

$alternate->getLinkage()?->script;         // 'Cyrl'
$alternate->getLinkage()?->isRightToLeft();
Bibliographic::of($record)->titleOriginalScript();
```

## Bibliographic shortcuts

`Bibliographic` reads standard MARC semantics off a record — ISBNs (020 and 024 with ISBN-10
conversion and `$z` excluded), titles with ISBD punctuation stripped, contributors with their
relator codes, publisher, dates, language and country codes, extent, subjects, classifications,
856 links, and the leader/007/338 checks behind `isMonograph()`, `isOnlineResource()` and
`isDeleted()`.

## Coded values

Every position of the leader, 006, 007 and 008 knows its own label and the values the standard
defines for it, so a record answers in words as well as in codes:

```php
$fixed = $record->getFixedField008();

$fixed->get('typeOfDate');        // 's'
$fixed->describe('typeOfDate');   // 'Single known date/probable date'
$fixed->label('literaryForm');    // 'Literary form'
$fixed->values('literaryForm');   // ['0' => 'Not fiction …', 'f' => 'Novels', …]
$fixed->toLabelled();             // every coded position, spelled out

$record->getLeader()->describe('encodingLevel');
$record->getFixedFields007()[0]->describe('specificMaterialDesignation');
```

`Bibliographic` uses them for the things a catalogue cares about — `dateType()`,
`originalPublicationDate()` (the original year behind a reprint), `isDateApproximate()`,
`isFiction()`, `literaryForm()`, `targetAudience()` and `isJuvenile()`.

`CodeList\Vocabularies` carries the source lists the standard points at: subject, classification
and genre/form scheme codes for `$2`, cataloguing conventions for 040`$e`, the RDA content, media
and carrier terms of 336-338, modes of issuance, frequencies, and the 537 geographic area codes of
043. `Bibliographic::contentTypeLabel()`, `carrierTypeLabel()`, `geographicAreas()` and
`catalogingConvention()` read them off a record.

## Code lists and validation

`CodeList\Languages`, `CodeList\Countries` (with a crosswalk to ISO 3166-1 alpha-2),
`CodeList\Relators` are generated by `tools/generate-codelists.php` from id.loc.gov.
`CodeList\Fields` — every field, indicator value and subfield of MARC 21 Bibliographic with its
label and repeatability, including the embedded holdings block — is generated by
`tools/generate-fields.php` from the Library of Congress concise list, and
`tools/generate-marc8-tables.php` builds the MARC-8 tables from the Library of Congress code
tables. Both sources live in `tools/data`. `Validation\Validator`
uses them to report undefined tags, subfields and indicator values, repeated non-repeatable ones,
broken fixed-field lengths, coded positions holding a value the standard does not define, and
scheme or area codes that are not in the lists they cite — while leaving locally defined fields (a
`9` anywhere in the tag, subfield `$9`) alone. Each check can be switched off on its own:
`new Validator(checkCodeLists: false, checkIndicators: false, checkFixedFields: false)`.

## Tests

```
composer test
composer analyse
```

## License

MPL-2.0. The code lists are derived from Library of Congress data, which is in the public domain.
