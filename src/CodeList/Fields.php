<?php

declare(strict_types=1);

namespace MirayS\Marc\CodeList;

final class Fields
{
    public const FORMAT = 'MARC 21 Bibliographic';

    public const SOURCE = 'https://www.loc.gov/marc/bibliographic/ecbdlist.html';

    public const TAGS = [
    '001' => [
        'label' => 'Control number',
        'repeatable' => false,
        'indicators' => [],
        'subfields' => [],
    ],
    '003' => [
        'label' => 'Control number identifier',
        'repeatable' => false,
        'indicators' => [],
        'subfields' => [],
    ],
    '005' => [
        'label' => 'Date and time of latest transaction',
        'repeatable' => false,
        'indicators' => [],
        'subfields' => [],
    ],
    '006' => [
        'label' => 'Fixed-length data elements--additional material characteristics--general information',
        'repeatable' => true,
        'indicators' => [],
        'subfields' => [],
    ],
    '007' => [
        'label' => 'Physical description fixed field--general information',
        'repeatable' => true,
        'indicators' => [],
        'subfields' => [],
    ],
    '008' => [
        'label' => 'Fixed-length data elements--general information',
        'repeatable' => false,
        'indicators' => [],
        'subfields' => [],
    ],
    '010' => [
        'label' => 'Library of congress control number',
        'repeatable' => false,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'LC control number', 'repeatable' => false],
            'b' => ['label' => 'NUCMC control number', 'repeatable' => true],
            'z' => ['label' => 'Canceled/invalid LC control number', 'repeatable' => true],
        ],
    ],
    '013' => [
        'label' => 'Patent control information',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Number', 'repeatable' => false],
            'b' => ['label' => 'Country', 'repeatable' => false],
            'c' => ['label' => 'Type of number', 'repeatable' => false],
            'd' => ['label' => 'Date', 'repeatable' => true],
            'e' => ['label' => 'Status', 'repeatable' => true],
            'f' => ['label' => 'Party to document', 'repeatable' => true],
        ],
    ],
    '015' => [
        'label' => 'National bibliography number',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '2' => ['label' => 'Source', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'National bibliography number', 'repeatable' => true],
            'q' => ['label' => 'Qualifying information', 'repeatable' => true],
            'z' => ['label' => 'Canceled/Invalid national bibliography number', 'repeatable' => true],
        ],
    ],
    '016' => [
        'label' => 'National bibliographic agency control number',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'National bibliographic agency',
                'values' => [
                    ' ' => 'Library and Archives Canada',
                    '7' => 'Agency identified in subfield $2',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '2' => ['label' => 'Source', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Record control number', 'repeatable' => false],
            'z' => ['label' => 'Canceled or invalid record control number', 'repeatable' => true],
        ],
    ],
    '017' => [
        'label' => 'Copyright or legal deposit number',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Display constant controller',
                'values' => [
                    ' ' => 'Copyright or legal deposit number',
                    '8' => 'No display constant controller generated',
                ],
            ],
        ],
        'subfields' => [
            '2' => ['label' => 'Source', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Copyright or legal deposit number', 'repeatable' => true],
            'b' => ['label' => 'Assigning agency', 'repeatable' => false],
            'd' => ['label' => 'Date', 'repeatable' => false],
            'i' => ['label' => 'Display text', 'repeatable' => false],
            'z' => ['label' => 'Canceled/invalid copyright or legal deposit number', 'repeatable' => true],
        ],
    ],
    '018' => [
        'label' => 'Copyright article-fee code',
        'repeatable' => false,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Copyright article-fee code', 'repeatable' => false],
        ],
    ],
    '020' => [
        'label' => 'International standard book number',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'International Standard Book Number', 'repeatable' => false],
            'c' => ['label' => 'Terms of availability', 'repeatable' => false],
            'q' => ['label' => 'Qualifying information', 'repeatable' => true],
            'z' => ['label' => 'Canceled/invalid ISBN', 'repeatable' => true],
        ],
    ],
    '022' => [
        'label' => 'International standard serial number',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Level of international interest',
                'values' => [
                    ' ' => 'No level specified',
                    '0' => 'Serial of international interest',
                    '1' => 'Serial not of international interest',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => false],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'International Standard Serial Number', 'repeatable' => false],
            'y' => ['label' => 'Incorrect ISSN', 'repeatable' => true],
            'z' => ['label' => 'Canceled ISSN', 'repeatable' => true],
        ],
    ],
    '023' => [
        'label' => 'Cluster issn',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Type of Cluster ISSN',
                'values' => [
                    '0' => 'ISSN-L',
                    '1' => 'ISSN-H',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => false],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Cluster ISSN', 'repeatable' => false],
            'y' => ['label' => 'Incorrect Cluster ISSN', 'repeatable' => true],
            'z' => ['label' => 'Canceled Cluster ISSN', 'repeatable' => true],
        ],
    ],
    '024' => [
        'label' => 'Other standard identifier',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Type of standard number or code',
                'values' => [
                    '0' => 'International Standard Recording Code (ISRC)',
                    '1' => 'Universal Product Code (UPC)',
                    '2' => 'International Standard Music Number (ISMN)',
                    '3' => 'International Article Number (EAN)',
                    '4' => 'Serial Item and Contribution Identifier (SICI)',
                    '7' => 'Source specified in subfield $2',
                    '8' => 'Unspecified type of standard number or code',
                ],
            ],
            2 => [
                'label' => 'Difference indicator',
                'values' => [
                    ' ' => 'No information provided',
                    '0' => 'No difference',
                    '1' => 'Difference',
                ],
            ],
        ],
        'subfields' => [
            '2' => ['label' => 'Source of number or code', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Standard number or code', 'repeatable' => false],
            'c' => ['label' => 'Terms of availability', 'repeatable' => false],
            'd' => ['label' => 'Additional codes following the standard number or code', 'repeatable' => false],
            'q' => ['label' => 'Qualifying information', 'repeatable' => true],
            'z' => ['label' => 'Canceled/invalid standard number or code', 'repeatable' => true],
        ],
    ],
    '025' => [
        'label' => 'Overseas acquisition number',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Overseas acquisition number', 'repeatable' => true],
        ],
    ],
    '026' => [
        'label' => 'Fingerprint identifier',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '2' => ['label' => 'Source', 'repeatable' => false],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'First and second groups of characters', 'repeatable' => false],
            'b' => ['label' => 'Third and fourth groups of characters', 'repeatable' => false],
            'c' => ['label' => 'Date', 'repeatable' => false],
            'd' => ['label' => 'Number of volume or part', 'repeatable' => true],
            'e' => ['label' => 'Unparsed fingerprint', 'repeatable' => false],
        ],
    ],
    '027' => [
        'label' => 'Standard technical report number',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Standard technical report number', 'repeatable' => false],
            'q' => ['label' => 'Qualifying information', 'repeatable' => true],
            'z' => ['label' => 'Canceled/invalid number', 'repeatable' => true],
        ],
    ],
    '028' => [
        'label' => 'Publisher number or distributor number',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Type of number',
                'values' => [
                    '0' => 'Issue number',
                    '1' => 'Matrix number',
                    '2' => 'Plate number',
                    '3' => 'Other music publisher number',
                    '4' => 'Video recording publisher number',
                    '5' => 'Other publisher number',
                    '6' => 'Distributor number',
                ],
            ],
            2 => [
                'label' => 'Note/added entry controller',
                'values' => [
                    '0' => 'No note, no added entry',
                    '1' => 'Note, added entry',
                    '2' => 'Note, no added entry',
                    '3' => 'No note, added entry',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Publisher or distributor number', 'repeatable' => false],
            'b' => ['label' => 'Source', 'repeatable' => false],
            'q' => ['label' => 'Qualifying information', 'repeatable' => true],
        ],
    ],
    '030' => [
        'label' => 'Coden designation',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'CODEN', 'repeatable' => false],
            'z' => ['label' => 'Canceled/invalid CODEN', 'repeatable' => true],
        ],
    ],
    '031' => [
        'label' => 'Musical incipits information',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '2' => ['label' => 'System code', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Number of work', 'repeatable' => false],
            'b' => ['label' => 'Number of movement', 'repeatable' => false],
            'c' => ['label' => 'Number of excerpt', 'repeatable' => false],
            'd' => ['label' => 'Caption or heading', 'repeatable' => true],
            'e' => ['label' => 'Role', 'repeatable' => false],
            'g' => ['label' => 'Clef', 'repeatable' => false],
            'm' => ['label' => 'Voice/instrument', 'repeatable' => false],
            'n' => ['label' => 'Key signature', 'repeatable' => false],
            'o' => ['label' => 'Time signature', 'repeatable' => false],
            'p' => ['label' => 'Musical notation', 'repeatable' => false],
            'q' => ['label' => 'General note', 'repeatable' => true],
            'r' => ['label' => 'Key or mode', 'repeatable' => false],
            's' => ['label' => 'Coded validity note', 'repeatable' => true],
            't' => ['label' => 'Text incipit', 'repeatable' => true],
            'u' => ['label' => 'Uniform Resource Identifier', 'repeatable' => true],
            'y' => ['label' => 'Link text', 'repeatable' => true],
            'z' => ['label' => 'Public note', 'repeatable' => true],
        ],
    ],
    '032' => [
        'label' => 'Postal registration number',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Postal registration number', 'repeatable' => false],
            'b' => ['label' => 'Source (agency assigning number)', 'repeatable' => false],
        ],
    ],
    '033' => [
        'label' => 'Date/time and place of an event',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Type of date in subfield $a',
                'values' => [
                    ' ' => 'No date information',
                    '0' => 'Single date',
                    '1' => 'Multiple single dates',
                    '2' => 'Range of dates',
                ],
            ],
            2 => [
                'label' => 'Type of event',
                'values' => [
                    ' ' => 'No information provided',
                    '0' => 'Capture',
                    '1' => 'Broadcast',
                    '2' => 'Finding',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of term', 'repeatable' => true],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Formatted date/time', 'repeatable' => true],
            'b' => ['label' => 'Geographic classification area code', 'repeatable' => true],
            'c' => ['label' => 'Geographic classification subarea code', 'repeatable' => true],
            'p' => ['label' => 'Place of event', 'repeatable' => true],
        ],
    ],
    '034' => [
        'label' => 'Coded cartographic mathematical data',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Type of scale',
                'values' => [
                    '0' => 'Scale indeterminable/No scale recorded',
                    '1' => 'Single scale',
                    '3' => 'Range of scales',
                ],
            ],
            2 => [
                'label' => 'Type of ring',
                'values' => [
                    ' ' => 'Not applicable',
                    '0' => 'Outer ring',
                    '1' => 'Exclusion ring',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Category of scale', 'repeatable' => false],
            'b' => ['label' => 'Constant ratio linear horizontal scale', 'repeatable' => true],
            'c' => ['label' => 'Constant ratio linear vertical scale', 'repeatable' => true],
            'd' => ['label' => 'Coordinates--westernmost longitude', 'repeatable' => false],
            'e' => ['label' => 'Coordinates--easternmost longitude', 'repeatable' => false],
            'f' => ['label' => 'Coordinates--northernmost latitude', 'repeatable' => false],
            'g' => ['label' => 'Coordinates--southernmost latitude', 'repeatable' => false],
            'h' => ['label' => 'Angular scale', 'repeatable' => true],
            'j' => ['label' => 'Declination--northern limit', 'repeatable' => false],
            'k' => ['label' => 'Declination--southern limit', 'repeatable' => false],
            'm' => ['label' => 'Right ascension--eastern limit', 'repeatable' => false],
            'n' => ['label' => 'Right ascension--western limit', 'repeatable' => false],
            'p' => ['label' => 'Equinox', 'repeatable' => false],
            'r' => ['label' => 'Distance from earth', 'repeatable' => false],
            's' => ['label' => 'G-ring latitude', 'repeatable' => true],
            't' => ['label' => 'G-ring longitude', 'repeatable' => true],
            'x' => ['label' => 'Beginning date', 'repeatable' => false],
            'y' => ['label' => 'Ending date', 'repeatable' => false],
            'z' => ['label' => 'Name of extraterrestrial body', 'repeatable' => false],
        ],
    ],
    '035' => [
        'label' => 'System control number',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'System control number', 'repeatable' => false],
            'z' => ['label' => 'Canceled/invalid control number', 'repeatable' => true],
        ],
    ],
    '036' => [
        'label' => 'Original study number for computer data files',
        'repeatable' => false,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Original study number', 'repeatable' => false],
            'b' => ['label' => 'Source (agency assigning number)', 'repeatable' => false],
        ],
    ],
    '037' => [
        'label' => 'Source of acquisition',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Source of acquisition sequence',
                'values' => [
                    ' ' => 'Not applicable/No information provided/Earliest',
                    '2' => 'Intervening',
                    '3' => 'Current/Latest',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Stock number', 'repeatable' => false],
            'b' => ['label' => 'Source of stock number/acquisition', 'repeatable' => false],
            'c' => ['label' => 'Terms of availability', 'repeatable' => true],
            'f' => ['label' => 'Form of issue', 'repeatable' => true],
            'g' => ['label' => 'Additional format characteristics', 'repeatable' => true],
            'n' => ['label' => 'Note', 'repeatable' => true],
        ],
    ],
    '038' => [
        'label' => 'Record content licensor',
        'repeatable' => false,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Record content licensor', 'repeatable' => false],
        ],
    ],
    '040' => [
        'label' => 'Cataloging source',
        'repeatable' => false,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Original cataloging agency', 'repeatable' => false],
            'b' => ['label' => 'Language of cataloging', 'repeatable' => false],
            'c' => ['label' => 'Transcribing agency', 'repeatable' => false],
            'd' => ['label' => 'Modifying agency', 'repeatable' => true],
            'e' => ['label' => 'Description conventions', 'repeatable' => true],
        ],
    ],
    '041' => [
        'label' => 'Language code',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Translation indication',
                'values' => [
                    ' ' => 'No information provided',
                    '0' => 'Item not a translation/does not include a translation',
                    '1' => 'Item is or includes a translation',
                ],
            ],
            2 => [
                'label' => 'Source of code',
                'values' => [
                    ' ' => 'MARC language code',
                    '7' => 'Source specified in subfield $2',
                ],
            ],
        ],
        'subfields' => [
            '2' => ['label' => 'Source of code', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Language code of text or sound track', 'repeatable' => true],
            'b' => ['label' => 'Language code of summary or abstract', 'repeatable' => true],
            'd' => ['label' => 'Language code of sung or spoken text', 'repeatable' => true],
            'e' => ['label' => 'Language code of librettos', 'repeatable' => true],
            'f' => ['label' => 'Language code of table of contents', 'repeatable' => true],
            'g' => ['label' => 'Language code of accompanying material other than librettos and transcripts', 'repeatable' => true],
            'h' => ['label' => 'Language code of original', 'repeatable' => true],
            'i' => ['label' => 'Language code of intertitles', 'repeatable' => true],
            'j' => ['label' => 'Language code of subtitles', 'repeatable' => true],
            'k' => ['label' => 'Language code of intermediate translations', 'repeatable' => true],
            'm' => ['label' => 'Language code of original accompanying materials other than librettos', 'repeatable' => true],
            'n' => ['label' => 'Language code of original libretto', 'repeatable' => true],
            'p' => ['label' => 'Language code of captions', 'repeatable' => true],
            'q' => ['label' => 'Language code of accessible audio', 'repeatable' => true],
            'r' => ['label' => 'Language code of accessible visual language (non-textual)', 'repeatable' => true],
            't' => ['label' => 'Language code of accompanying transcripts for audiovisual materials', 'repeatable' => true],
        ],
    ],
    '042' => [
        'label' => 'Authentication code',
        'repeatable' => false,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            'a' => ['label' => 'Authentication code', 'repeatable' => true],
        ],
    ],
    '043' => [
        'label' => 'Geographic area code',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of local code', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Geographic area code', 'repeatable' => true],
            'b' => ['label' => 'Local GAC code', 'repeatable' => true],
            'c' => ['label' => 'ISO code', 'repeatable' => true],
        ],
    ],
    '044' => [
        'label' => 'Country of publishing/producing entity code',
        'repeatable' => false,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '2' => ['label' => 'Source of local subentity code', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'MARC country code', 'repeatable' => true],
            'b' => ['label' => 'Local subentity code', 'repeatable' => true],
            'c' => ['label' => 'ISO country code', 'repeatable' => true],
        ],
    ],
    '045' => [
        'label' => 'Time period of content',
        'repeatable' => false,
        'indicators' => [
            1 => [
                'label' => 'Type of time period in subfield $b or $c',
                'values' => [
                    ' ' => 'Subfield $b or $c not present',
                    '0' => 'Single date/time',
                    '1' => 'Multiple single dates/times',
                    '2' => 'Range of dates/times',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Time period code', 'repeatable' => true],
            'b' => ['label' => 'Formatted 9999 B.C. through C.E. time period', 'repeatable' => true],
            'c' => ['label' => 'Formatted pre-9999 B.C. time period', 'repeatable' => true],
        ],
    ],
    '046' => [
        'label' => 'Special coded dates',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Type of entity',
                'values' => [
                    ' ' => 'No information provided',
                    '1' => 'Work',
                    '2' => 'Expression',
                    '3' => 'Manifestation',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '2' => ['label' => 'Source of date', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Type of date code', 'repeatable' => false],
            'b' => ['label' => 'Date 1 (B.C.E. date)', 'repeatable' => false],
            'c' => ['label' => 'Date 1 (C.E. date)', 'repeatable' => false],
            'd' => ['label' => 'Date 2 (B.C.E. date)', 'repeatable' => false],
            'e' => ['label' => 'Date 2 (C.E. date)', 'repeatable' => false],
            'j' => ['label' => 'Date resource modified', 'repeatable' => false],
            'k' => ['label' => 'Beginning or single date created', 'repeatable' => false],
            'l' => ['label' => 'Ending date created', 'repeatable' => false],
            'm' => ['label' => 'Beginning of date valid', 'repeatable' => false],
            'n' => ['label' => 'End of date valid', 'repeatable' => false],
            'o' => ['label' => 'Single or starting date for aggregated content', 'repeatable' => false],
            'p' => ['label' => 'Ending date for aggregated content', 'repeatable' => false],
            'x' => ['label' => 'Nonpublic note', 'repeatable' => true],
            'z' => ['label' => 'Public note', 'repeatable' => true],
        ],
    ],
    '047' => [
        'label' => 'Form of musical composition code',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Source of code',
                'values' => [
                    ' ' => 'MARC musical composition code',
                    '7' => 'Source specified in subfield $2',
                ],
            ],
        ],
        'subfields' => [
            '2' => ['label' => 'Source of code', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Form of musical composition code', 'repeatable' => true],
        ],
    ],
    '048' => [
        'label' => 'Number of musical instruments or voices code',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Source of code',
                'values' => [
                    ' ' => 'MARC code',
                    '7' => 'Source specified in subfield $2',
                ],
            ],
        ],
        'subfields' => [
            '2' => ['label' => 'Source of code', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Performer or ensemble', 'repeatable' => true],
            'b' => ['label' => 'Soloist', 'repeatable' => true],
        ],
    ],
    '050' => [
        'label' => 'Library of congress call number',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Existence in LC collection',
                'values' => [
                    ' ' => 'No information provided',
                    '0' => 'Item is in LC',
                    '1' => 'Item is not in LC',
                ],
            ],
            2 => [
                'label' => 'Source of call number',
                'values' => [
                    '0' => 'Assigned by LC',
                    '4' => 'Assigned by agency other than LC',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Classification number', 'repeatable' => true],
            'b' => ['label' => 'Item number', 'repeatable' => false],
        ],
    ],
    '051' => [
        'label' => 'Library of congress copy, issue, offprint statement',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Classification number', 'repeatable' => false],
            'b' => ['label' => 'Item number', 'repeatable' => false],
            'c' => ['label' => 'Copy information', 'repeatable' => false],
        ],
    ],
    '052' => [
        'label' => 'Geographic classification',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Code source',
                'values' => [
                    ' ' => 'Library of Congress Classification',
                    '1' => 'U.S. Dept. of Defense Classification',
                    '7' => 'Source specified in subfield $2',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Code source', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Geographic classification area code', 'repeatable' => false],
            'b' => ['label' => 'Geographic classification subarea code', 'repeatable' => true],
            'd' => ['label' => 'Populated place name', 'repeatable' => true],
        ],
    ],
    '055' => [
        'label' => 'Classification numbers assigned in canada',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Existence in LAC collection',
                'values' => [
                    ' ' => 'Information not provided',
                    '0' => 'Work held by LAC',
                    '1' => 'Work not held by LAC',
                ],
            ],
            2 => [
                'label' => 'Type, completeness, source of call/class number',
                'values' => [
                    '0' => 'LCC (or LCC-compatible) call number assigned by LAC',
                    '1' => 'Complete LCC (or LCC-compatible) class number assigned by LAC',
                    '2' => 'Incomplete LCC (or LCC-compatible) class number assigned by LAC',
                    '3' => 'LCC (or LCC-compatible) call number assigned by a Canadian organization other than LAC',
                    '4' => 'Complete LCC (or LCC-compatible) class number assigned by a Canadian organization other than LAC',
                    '5' => 'Incomplete LCC (or LCC-compatible) class number assigned by a Canadian organization other than LAC',
                    '6' => 'Other call number assigned by LAC',
                    '7' => 'Other class number assigned by LAC',
                    '8' => 'Other call number assigned by a Canadian organization other than LAC',
                    '9' => 'Other class number assigned by a Canadian organization other than LAC',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of call/class number', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Classification number', 'repeatable' => false],
            'b' => ['label' => 'Item number', 'repeatable' => false],
        ],
    ],
    '060' => [
        'label' => 'National library of medicine call number',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Existence in NLM collection',
                'values' => [
                    ' ' => 'No information provided',
                    '0' => 'Item is in NLM',
                    '1' => 'Item is not in NLM',
                ],
            ],
            2 => [
                'label' => 'Source of call number',
                'values' => [
                    '0' => 'Assigned by NLM',
                    '4' => 'Assigned by agency other than NLM',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Classification number', 'repeatable' => true],
            'b' => ['label' => 'Item number', 'repeatable' => false],
        ],
    ],
    '061' => [
        'label' => 'National library of medicine copy statement',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Classification number', 'repeatable' => true],
            'b' => ['label' => 'Item number', 'repeatable' => false],
            'c' => ['label' => 'Copy information', 'repeatable' => false],
        ],
    ],
    '066' => [
        'label' => 'Character sets present',
        'repeatable' => false,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            'a' => ['label' => 'Primary G0 character set', 'repeatable' => false],
            'b' => ['label' => 'Primary G1 character set', 'repeatable' => false],
            'c' => ['label' => 'Alternate G0 or G1 character set', 'repeatable' => true],
        ],
    ],
    '070' => [
        'label' => 'National agricultural library call number',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Existence in NAL collection',
                'values' => [
                    ' ' => 'No information provided',
                    '0' => 'Item is in NAL',
                    '1' => 'Item is not in NAL',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Classification number', 'repeatable' => true],
            'b' => ['label' => 'Item number', 'repeatable' => false],
        ],
    ],
    '071' => [
        'label' => 'National agricultural library copy statement',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Classification number', 'repeatable' => true],
            'b' => ['label' => 'Item number', 'repeatable' => false],
            'c' => ['label' => 'Copy information', 'repeatable' => false],
        ],
    ],
    '072' => [
        'label' => 'Subject category code',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Code source',
                'values' => [
                    '0' => 'NAL subject category code list',
                    '7' => 'Code source specified in subfield $2',
                ],
            ],
        ],
        'subfields' => [
            '2' => ['label' => 'Source', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Subject category code', 'repeatable' => false],
            'x' => ['label' => 'Subject category code subdivision', 'repeatable' => true],
        ],
    ],
    '074' => [
        'label' => 'Gpo item number',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'GPO item number', 'repeatable' => false],
            'z' => ['label' => 'Canceled/invalid GPO item number', 'repeatable' => true],
        ],
    ],
    '080' => [
        'label' => 'Universal decimal classification number',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Type of edition',
                'values' => [
                    ' ' => 'No information provided',
                    '0' => 'Full',
                    '1' => 'Abridged',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Edition identifier', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Universal Decimal Classification number', 'repeatable' => false],
            'b' => ['label' => 'Item number', 'repeatable' => false],
            'x' => ['label' => 'Common auxiliary subdivision', 'repeatable' => true],
        ],
    ],
    '082' => [
        'label' => 'Dewey decimal classification number',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Type of edition',
                'values' => [
                    '0' => 'Full edition',
                    '1' => 'Abridged edition',
                    '7' => 'Other edition specified in subfield $2',
                ],
            ],
            2 => [
                'label' => 'Source of classification number',
                'values' => [
                    ' ' => 'No information provided',
                    '0' => 'Assigned by LC',
                    '4' => 'Assigned by agency other than LC',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Edition information', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Classification number', 'repeatable' => true],
            'b' => ['label' => 'Item number', 'repeatable' => false],
            'm' => ['label' => 'Standard or optional designation', 'repeatable' => false],
            'q' => ['label' => 'Assigning agency', 'repeatable' => false],
        ],
    ],
    '083' => [
        'label' => 'Additional dewey decimal classification number',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Type of edition',
                'values' => [
                    '0' => 'Full edition',
                    '1' => 'Abridged edition',
                    '7' => 'Other edition specified in subfield $2',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Edition information', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Classification number', 'repeatable' => true],
            'c' => ['label' => 'Classification number--Ending number of span', 'repeatable' => true],
            'm' => ['label' => 'Standard or optional designation', 'repeatable' => false],
            'q' => ['label' => 'Assigning agency', 'repeatable' => false],
            'y' => ['label' => 'Table sequence number for internal subarrangement or add table', 'repeatable' => true],
            'z' => ['label' => 'Table identification', 'repeatable' => true],
        ],
    ],
    '084' => [
        'label' => 'Other classification number',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of number', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Classification number', 'repeatable' => true],
            'b' => ['label' => 'Item number', 'repeatable' => false],
            'q' => ['label' => 'Assigning agency', 'repeatable' => false],
        ],
    ],
    '085' => [
        'label' => 'Synthesized classification number components',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Number where instructions are found-single number or beginning number of span', 'repeatable' => true],
            'b' => ['label' => 'Base number', 'repeatable' => true],
            'c' => ['label' => 'Classification number-ending number of span', 'repeatable' => true],
            'f' => ['label' => 'Facet designator', 'repeatable' => true],
            'r' => ['label' => 'Root number', 'repeatable' => true],
            's' => ['label' => 'Digits added from classification number in schedule or external table', 'repeatable' => true],
            't' => ['label' => 'Digits added from internal subarrangement or add table', 'repeatable' => true],
            'u' => ['label' => 'Number being analyzed', 'repeatable' => true],
            'v' => ['label' => 'Number in internal subarrangement or add table where instructions are found', 'repeatable' => true],
            'w' => ['label' => 'Table identification-Internal subarrangement or add table', 'repeatable' => true],
            'y' => ['label' => 'Table sequence number for internal subarrangement or add table', 'repeatable' => true],
            'z' => ['label' => 'Table identification', 'repeatable' => true],
        ],
    ],
    '086' => [
        'label' => 'Government document classification number',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Number source',
                'values' => [
                    ' ' => 'Source specified in subfield $2',
                    '0' => 'Superintendent of Documents Classification System',
                    '1' => 'Government of Canada Publications: Outline of Classification',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Number source', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Classification number', 'repeatable' => false],
            'z' => ['label' => 'Canceled/invalid classification number', 'repeatable' => true],
        ],
    ],
    '088' => [
        'label' => 'Report number',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Report number', 'repeatable' => false],
            'z' => ['label' => 'Canceled/invalid report number', 'repeatable' => true],
        ],
    ],
    '100' => [
        'label' => 'Main entry--personal name',
        'repeatable' => false,
        'indicators' => [
            1 => [
                'label' => 'Type of personal name entry element',
                'values' => [
                    '0' => 'Forename',
                    '1' => 'Surname',
                    '3' => 'Family name',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of heading or term', 'repeatable' => false],
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Personal name', 'repeatable' => false],
            'b' => ['label' => 'Numeration', 'repeatable' => false],
            'c' => ['label' => 'Titles and other words associated with a name', 'repeatable' => true],
            'd' => ['label' => 'Dates associated with a name', 'repeatable' => false],
            'e' => ['label' => 'Relator term', 'repeatable' => true],
            'f' => ['label' => 'Date of a work', 'repeatable' => false],
            'g' => ['label' => 'Miscellaneous information', 'repeatable' => true],
            'j' => ['label' => 'Attribution qualifier', 'repeatable' => true],
            'k' => ['label' => 'Form subheading', 'repeatable' => true],
            'l' => ['label' => 'Language of a work', 'repeatable' => false],
            'n' => ['label' => 'Number of part/section of a work', 'repeatable' => true],
            'p' => ['label' => 'Name of part/section of a work', 'repeatable' => true],
            'q' => ['label' => 'Fuller form of name', 'repeatable' => false],
            't' => ['label' => 'Title of a work', 'repeatable' => false],
            'u' => ['label' => 'Affiliation', 'repeatable' => false],
        ],
    ],
    '110' => [
        'label' => 'Main entry--corporate name',
        'repeatable' => false,
        'indicators' => [
            1 => [
                'label' => 'Type of corporate name entry element',
                'values' => [
                    '0' => 'Inverted name',
                    '1' => 'Jurisdiction name',
                    '2' => 'Name in direct order',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of heading or term', 'repeatable' => false],
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Corporate name or jurisdiction name as entry element', 'repeatable' => false],
            'b' => ['label' => 'Subordinate unit', 'repeatable' => true],
            'c' => ['label' => 'Location of meeting', 'repeatable' => true],
            'd' => ['label' => 'Date of meeting or treaty signing', 'repeatable' => true],
            'e' => ['label' => 'Relator term', 'repeatable' => true],
            'f' => ['label' => 'Date of a work', 'repeatable' => false],
            'g' => ['label' => 'Miscellaneous information', 'repeatable' => true],
            'k' => ['label' => 'Form subheading', 'repeatable' => true],
            'l' => ['label' => 'Language of a work', 'repeatable' => false],
            'n' => ['label' => 'Number of part/section/meeting', 'repeatable' => true],
            'p' => ['label' => 'Name of part/section of a work', 'repeatable' => true],
            't' => ['label' => 'Title of a work', 'repeatable' => false],
            'u' => ['label' => 'Affiliation', 'repeatable' => false],
        ],
    ],
    '111' => [
        'label' => 'Main entry--meeting name',
        'repeatable' => false,
        'indicators' => [
            1 => [
                'label' => 'Type of meeting name entry element',
                'values' => [
                    '0' => 'Inverted name',
                    '1' => 'Jurisdiction name',
                    '2' => 'Name in direct order',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of heading or term', 'repeatable' => false],
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Meeting name or jurisdiction name as entry element', 'repeatable' => false],
            'c' => ['label' => 'Location of meeting', 'repeatable' => true],
            'd' => ['label' => 'Date of meeting or treaty signing', 'repeatable' => true],
            'e' => ['label' => 'Subordinate unit', 'repeatable' => true],
            'f' => ['label' => 'Date of a work', 'repeatable' => false],
            'g' => ['label' => 'Miscellaneous information', 'repeatable' => true],
            'j' => ['label' => 'Relator term', 'repeatable' => true],
            'k' => ['label' => 'Form subheading', 'repeatable' => true],
            'l' => ['label' => 'Language of a work', 'repeatable' => false],
            'n' => ['label' => 'Number of part/section/meeting', 'repeatable' => true],
            'p' => ['label' => 'Name of part/section of a work', 'repeatable' => true],
            'q' => ['label' => 'Name of meeting following jurisdiction name entry element', 'repeatable' => false],
            't' => ['label' => 'Title of a work', 'repeatable' => false],
            'u' => ['label' => 'Affiliation', 'repeatable' => false],
        ],
    ],
    '130' => [
        'label' => 'Main entry--uniform title',
        'repeatable' => false,
        'indicators' => [
            1 => [
                'label' => 'Nonfiling characters',
                'values' => [
                    '0' => 'Number of nonfiling characters present',
                    '1' => 'Number of nonfiling characters present',
                    '2' => 'Number of nonfiling characters present',
                    '3' => 'Number of nonfiling characters present',
                    '4' => 'Number of nonfiling characters present',
                    '5' => 'Number of nonfiling characters present',
                    '6' => 'Number of nonfiling characters present',
                    '7' => 'Number of nonfiling characters present',
                    '8' => 'Number of nonfiling characters present',
                    '9' => 'Number of nonfiling characters present',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of heading or term', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Uniform title', 'repeatable' => false],
            'd' => ['label' => 'Date of treaty signing', 'repeatable' => true],
            'f' => ['label' => 'Date of a work', 'repeatable' => false],
            'g' => ['label' => 'Miscellaneous information', 'repeatable' => true],
            'h' => ['label' => 'Medium', 'repeatable' => false],
            'k' => ['label' => 'Form subheading', 'repeatable' => true],
            'l' => ['label' => 'Language of a work', 'repeatable' => false],
            'm' => ['label' => 'Medium of performance for music', 'repeatable' => true],
            'n' => ['label' => 'Number of part/section of a work', 'repeatable' => true],
            'o' => ['label' => 'Arranged statement for music', 'repeatable' => false],
            'p' => ['label' => 'Name of part/section of a work', 'repeatable' => true],
            'r' => ['label' => 'Key for music', 'repeatable' => false],
            's' => ['label' => 'Version', 'repeatable' => true],
            't' => ['label' => 'Title of a work', 'repeatable' => false],
        ],
    ],
    '210' => [
        'label' => 'Abbreviated title',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Title added entry',
                'values' => [
                    '0' => 'No added entry',
                    '1' => 'Added entry',
                ],
            ],
            2 => [
                'label' => 'Type',
                'values' => [
                    ' ' => 'Abbreviated key title',
                    '0' => 'Other abbreviated title',
                ],
            ],
        ],
        'subfields' => [
            '2' => ['label' => 'Source', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Abbreviated title', 'repeatable' => false],
            'b' => ['label' => 'Qualifying information', 'repeatable' => false],
        ],
    ],
    '222' => [
        'label' => 'Key title',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Nonfiling characters',
                'values' => [
                    '0' => 'Number of nonfiling characters',
                    '1' => 'Number of nonfiling characters',
                    '2' => 'Number of nonfiling characters',
                    '3' => 'Number of nonfiling characters',
                    '4' => 'Number of nonfiling characters',
                    '5' => 'Number of nonfiling characters',
                    '6' => 'Number of nonfiling characters',
                    '7' => 'Number of nonfiling characters',
                    '8' => 'Number of nonfiling characters',
                    '9' => 'Number of nonfiling characters',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Key title', 'repeatable' => false],
            'b' => ['label' => 'Qualifying information', 'repeatable' => false],
        ],
    ],
    '240' => [
        'label' => 'Uniform title',
        'repeatable' => false,
        'indicators' => [
            1 => [
                'label' => 'Uniform title printed or displayed',
                'values' => [
                    '0' => 'Not printed or displayed',
                    '1' => 'Printed or displayed',
                ],
            ],
            2 => [
                'label' => 'Nonfiling characters',
                'values' => [
                    '0' => 'Number of nonfiling characters',
                    '1' => 'Number of nonfiling characters',
                    '2' => 'Number of nonfiling characters',
                    '3' => 'Number of nonfiling characters',
                    '4' => 'Number of nonfiling characters',
                    '5' => 'Number of nonfiling characters',
                    '6' => 'Number of nonfiling characters',
                    '7' => 'Number of nonfiling characters',
                    '8' => 'Number of nonfiling characters',
                    '9' => 'Number of nonfiling characters',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of heading or term', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Uniform title', 'repeatable' => false],
            'd' => ['label' => 'Date of treaty signing', 'repeatable' => true],
            'f' => ['label' => 'Date of a work', 'repeatable' => false],
            'g' => ['label' => 'Miscellaneous information', 'repeatable' => true],
            'h' => ['label' => 'Medium', 'repeatable' => false],
            'k' => ['label' => 'Form subheading', 'repeatable' => true],
            'l' => ['label' => 'Language of a work', 'repeatable' => false],
            'm' => ['label' => 'Medium of performance for music', 'repeatable' => true],
            'n' => ['label' => 'Number of part/section of a work', 'repeatable' => true],
            'o' => ['label' => 'Arranged statement for music', 'repeatable' => false],
            'p' => ['label' => 'Name of part/section of a work', 'repeatable' => true],
            'r' => ['label' => 'Key for music', 'repeatable' => false],
            's' => ['label' => 'Version', 'repeatable' => true],
        ],
    ],
    '242' => [
        'label' => 'Translation of title by cataloging agency',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Title added entry',
                'values' => [
                    '0' => 'No added entry',
                    '1' => 'Added entry',
                ],
            ],
            2 => [
                'label' => 'Nonfiling characters',
                'values' => [
                    '0' => 'Number of nonfiling characters',
                    '1' => 'Number of nonfiling characters',
                    '2' => 'Number of nonfiling characters',
                    '3' => 'Number of nonfiling characters',
                    '4' => 'Number of nonfiling characters',
                    '5' => 'Number of nonfiling characters',
                    '6' => 'Number of nonfiling characters',
                    '7' => 'Number of nonfiling characters',
                    '8' => 'Number of nonfiling characters',
                    '9' => 'Number of nonfiling characters',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Title', 'repeatable' => false],
            'b' => ['label' => 'Remainder of title', 'repeatable' => false],
            'c' => ['label' => 'Statement of responsibility, etc.', 'repeatable' => false],
            'h' => ['label' => 'Medium', 'repeatable' => false],
            'n' => ['label' => 'Number of part/section of a work', 'repeatable' => true],
            'p' => ['label' => 'Name of part/section of a work', 'repeatable' => true],
            'y' => ['label' => 'Language code of translated title', 'repeatable' => false],
        ],
    ],
    '243' => [
        'label' => 'Collective uniform title',
        'repeatable' => false,
        'indicators' => [
            1 => [
                'label' => 'Uniform title printed or displayed',
                'values' => [
                    '0' => 'Not printed or displayed',
                    '1' => 'Printed or displayed',
                ],
            ],
            2 => [
                'label' => 'Nonfiling characters',
                'values' => [
                    '0' => 'Number of nonfiling characters',
                    '1' => 'Number of nonfiling characters',
                    '2' => 'Number of nonfiling characters',
                    '3' => 'Number of nonfiling characters',
                    '4' => 'Number of nonfiling characters',
                    '5' => 'Number of nonfiling characters',
                    '6' => 'Number of nonfiling characters',
                    '7' => 'Number of nonfiling characters',
                    '8' => 'Number of nonfiling characters',
                    '9' => 'Number of nonfiling characters',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Uniform title', 'repeatable' => false],
            'd' => ['label' => 'Date of treaty signing', 'repeatable' => true],
            'f' => ['label' => 'Date of a work', 'repeatable' => false],
            'g' => ['label' => 'Miscellaneous information', 'repeatable' => true],
            'h' => ['label' => 'Medium', 'repeatable' => false],
            'k' => ['label' => 'Form subheading', 'repeatable' => true],
            'l' => ['label' => 'Language of a work', 'repeatable' => false],
            'm' => ['label' => 'Medium of performance for music', 'repeatable' => true],
            'n' => ['label' => 'Number of part/section of a work', 'repeatable' => true],
            'o' => ['label' => 'Arranged statement for music', 'repeatable' => false],
            'p' => ['label' => 'Name of part/section of a work', 'repeatable' => true],
            'r' => ['label' => 'Key for music', 'repeatable' => false],
            's' => ['label' => 'Version', 'repeatable' => true],
        ],
    ],
    '245' => [
        'label' => 'Title statement',
        'repeatable' => false,
        'indicators' => [
            1 => [
                'label' => 'Title added entry',
                'values' => [
                    '0' => 'No added entry',
                    '1' => 'Added entry',
                ],
            ],
            2 => [
                'label' => 'Nonfiling characters',
                'values' => [
                    '0' => 'Number of nonfiling characters',
                    '1' => 'Number of nonfiling characters',
                    '2' => 'Number of nonfiling characters',
                    '3' => 'Number of nonfiling characters',
                    '4' => 'Number of nonfiling characters',
                    '5' => 'Number of nonfiling characters',
                    '6' => 'Number of nonfiling characters',
                    '7' => 'Number of nonfiling characters',
                    '8' => 'Number of nonfiling characters',
                    '9' => 'Number of nonfiling characters',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Title', 'repeatable' => false],
            'b' => ['label' => 'Remainder of title', 'repeatable' => false],
            'c' => ['label' => 'Statement of responsibility, etc.', 'repeatable' => false],
            'f' => ['label' => 'Inclusive dates', 'repeatable' => false],
            'g' => ['label' => 'Bulk dates', 'repeatable' => false],
            'h' => ['label' => 'Medium', 'repeatable' => false],
            'k' => ['label' => 'Form', 'repeatable' => true],
            'n' => ['label' => 'Number of part/section of a work', 'repeatable' => true],
            'p' => ['label' => 'Name of part/section of a work', 'repeatable' => true],
            's' => ['label' => 'Version', 'repeatable' => false],
            'z' => ['label' => 'Title statement context note', 'repeatable' => false],
        ],
    ],
    '246' => [
        'label' => 'Varying form of title',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Note/added entry controller',
                'values' => [
                    '0' => 'Note, no added entry',
                    '1' => 'Note, added entry',
                    '2' => 'No note, no title added entry',
                    '3' => 'No note, added entry',
                ],
            ],
            2 => [
                'label' => 'Type of title',
                'values' => [
                    ' ' => 'No type specified',
                    '0' => 'Portion of title',
                    '1' => 'Parallel title',
                    '2' => 'Distinctive title',
                    '3' => 'Other title',
                    '4' => 'Cover title',
                    '5' => 'Added title page title',
                    '6' => 'Caption title',
                    '7' => 'Running title',
                    '8' => 'Spine title',
                ],
            ],
        ],
        'subfields' => [
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Title proper/short title', 'repeatable' => false],
            'b' => ['label' => 'Remainder of title', 'repeatable' => false],
            'f' => ['label' => 'Date or sequential designation', 'repeatable' => false],
            'g' => ['label' => 'Miscellaneous information', 'repeatable' => true],
            'h' => ['label' => 'Medium', 'repeatable' => false],
            'i' => ['label' => 'Display text', 'repeatable' => false],
            'n' => ['label' => 'Number of part/section of a work', 'repeatable' => true],
            'p' => ['label' => 'Name of part/section of a work', 'repeatable' => true],
        ],
    ],
    '247' => [
        'label' => 'Former title',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Title added entry',
                'values' => [
                    '0' => 'No added entry',
                    '1' => 'Added entry',
                ],
            ],
            2 => [
                'label' => 'Note controller',
                'values' => [
                    '0' => 'Display note',
                    '1' => 'Do not display note',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Title', 'repeatable' => false],
            'b' => ['label' => 'Remainder of title', 'repeatable' => false],
            'f' => ['label' => 'Date or sequential designation', 'repeatable' => false],
            'g' => ['label' => 'Miscellaneous information', 'repeatable' => true],
            'h' => ['label' => 'Medium', 'repeatable' => false],
            'n' => ['label' => 'Number of part/section of a work', 'repeatable' => true],
            'p' => ['label' => 'Name of part/section of a work', 'repeatable' => true],
            'x' => ['label' => 'International Standard Serial Number', 'repeatable' => false],
        ],
    ],
    '250' => [
        'label' => 'Edition statement',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Edition statement', 'repeatable' => false],
            'b' => ['label' => 'Remainder of edition statement', 'repeatable' => false],
        ],
    ],
    '251' => [
        'label' => 'Version information',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Version', 'repeatable' => true],
        ],
    ],
    '254' => [
        'label' => 'Musical presentation statement',
        'repeatable' => false,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Musical presentation statement', 'repeatable' => false],
        ],
    ],
    '255' => [
        'label' => 'Cartographic mathematical data',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Statement of scale', 'repeatable' => false],
            'b' => ['label' => 'Statement of projection', 'repeatable' => false],
            'c' => ['label' => 'Statement of coordinates', 'repeatable' => false],
            'd' => ['label' => 'Statement of zone', 'repeatable' => false],
            'e' => ['label' => 'Statement of equinox', 'repeatable' => false],
            'f' => ['label' => 'Outer G-ring coordinate pairs', 'repeatable' => false],
            'g' => ['label' => 'Exclusion G-ring coordinate pairs', 'repeatable' => false],
        ],
    ],
    '256' => [
        'label' => 'Computer file characteristics',
        'repeatable' => false,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Computer file characteristics', 'repeatable' => false],
        ],
    ],
    '257' => [
        'label' => 'Country of producing entity',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Country of producing entity', 'repeatable' => true],
        ],
    ],
    '258' => [
        'label' => 'Philatelic issue date',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Issuing jurisdiction', 'repeatable' => false],
            'b' => ['label' => 'Denomination', 'repeatable' => false],
        ],
    ],
    '260' => [
        'label' => 'Publication, distribution, etc. (imprint)',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Sequence of publishing statements',
                'values' => [
                    ' ' => 'Not applicable/No information provided/Earliest available publisher',
                    '2' => 'Intervening publisher',
                    '3' => 'Current/latest publisher',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Place of publication, distribution, etc.', 'repeatable' => true],
            'b' => ['label' => 'Name of publisher, distributor, etc.', 'repeatable' => true],
            'c' => ['label' => 'Date of publication, distribution, etc.', 'repeatable' => true],
            'e' => ['label' => 'Place of manufacture', 'repeatable' => true],
            'f' => ['label' => 'Manufacturer', 'repeatable' => true],
            'g' => ['label' => 'Date of manufacture', 'repeatable' => true],
        ],
    ],
    '263' => [
        'label' => 'Projected publication date',
        'repeatable' => false,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Projected publication date', 'repeatable' => false],
        ],
    ],
    '264' => [
        'label' => 'Production, publication, distribution, manufacture, and copyright notice',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Sequence of statements',
                'values' => [
                    ' ' => 'Not applicable/No information provided/Earliest',
                    '2' => 'Intervening',
                    '3' => 'Current/latest',
                ],
            ],
            2 => [
                'label' => 'Function of entity',
                'values' => [
                    '0' => 'Production',
                    '1' => 'Publication',
                    '2' => 'Distribution',
                    '3' => 'Manufacture',
                    '4' => 'Copyright notice date',
                ],
            ],
        ],
        'subfields' => [
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Place of production, publication, distribution, manufacture', 'repeatable' => true],
            'b' => ['label' => 'Name of producer, publisher, distributor, manufacturer', 'repeatable' => true],
            'c' => ['label' => 'Date of production, publication, distribution, manufacture, or copyright notice', 'repeatable' => true],
        ],
    ],
    '270' => [
        'label' => 'Address',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Level',
                'values' => [
                    ' ' => 'No level specified',
                    '1' => 'Primary',
                    '2' => 'Secondary',
                ],
            ],
            2 => [
                'label' => 'Type of address',
                'values' => [
                    ' ' => 'No type specified',
                    '0' => 'Mailing',
                    '7' => 'Type specified in subfield $i',
                ],
            ],
        ],
        'subfields' => [
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Address', 'repeatable' => true],
            'b' => ['label' => 'City', 'repeatable' => false],
            'c' => ['label' => 'State or province', 'repeatable' => false],
            'd' => ['label' => 'Country', 'repeatable' => false],
            'e' => ['label' => 'Postal code', 'repeatable' => false],
            'f' => ['label' => 'Terms preceding attention name', 'repeatable' => false],
            'g' => ['label' => 'Attention name', 'repeatable' => false],
            'h' => ['label' => 'Attention position', 'repeatable' => false],
            'i' => ['label' => 'Type of address', 'repeatable' => false],
            'j' => ['label' => 'Specialized telephone number', 'repeatable' => true],
            'k' => ['label' => 'Telephone number', 'repeatable' => true],
            'l' => ['label' => 'Fax number', 'repeatable' => true],
            'm' => ['label' => 'Electronic mail address', 'repeatable' => true],
            'n' => ['label' => 'TDD or TTY number', 'repeatable' => true],
            'p' => ['label' => 'Contact person', 'repeatable' => true],
            'q' => ['label' => 'Title of contact person', 'repeatable' => true],
            'r' => ['label' => 'Hours', 'repeatable' => true],
            'z' => ['label' => 'Public note', 'repeatable' => true],
        ],
    ],
    '300' => [
        'label' => 'Physical description',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Extent', 'repeatable' => true],
            'b' => ['label' => 'Other physical details', 'repeatable' => false],
            'c' => ['label' => 'Dimensions', 'repeatable' => true],
            'e' => ['label' => 'Accompanying material', 'repeatable' => false],
            'f' => ['label' => 'Type of unit', 'repeatable' => true],
            'g' => ['label' => 'Size of unit', 'repeatable' => true],
        ],
    ],
    '306' => [
        'label' => 'Playing time',
        'repeatable' => false,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Playing time', 'repeatable' => true],
        ],
    ],
    '307' => [
        'label' => 'Hours, etc.',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Display constant controller',
                'values' => [
                    ' ' => 'Hours',
                    '8' => 'No display constant generated',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Hours', 'repeatable' => false],
            'b' => ['label' => 'Additional information', 'repeatable' => false],
        ],
    ],
    '310' => [
        'label' => 'Current publication frequency',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => false],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Current publication frequency', 'repeatable' => false],
            'b' => ['label' => 'Date of current publication frequency', 'repeatable' => false],
        ],
    ],
    '321' => [
        'label' => 'Former publication frequency',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => false],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Former publication frequency', 'repeatable' => false],
            'b' => ['label' => 'Dates of former publication frequency', 'repeatable' => false],
        ],
    ],
    '334' => [
        'label' => 'Mode of issuance',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Mode of issuance term', 'repeatable' => false],
            'b' => ['label' => 'Mode of issuance code', 'repeatable' => false],
        ],
    ],
    '335' => [
        'label' => 'Extension plan',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Extension plan term', 'repeatable' => false],
            'b' => ['label' => 'Extension plan code', 'repeatable' => false],
        ],
    ],
    '336' => [
        'label' => 'Content type',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Content type term', 'repeatable' => true],
            'b' => ['label' => 'Content type code', 'repeatable' => true],
        ],
    ],
    '337' => [
        'label' => 'Media type',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Media type term', 'repeatable' => true],
            'b' => ['label' => 'Media type code', 'repeatable' => true],
        ],
    ],
    '338' => [
        'label' => 'Carrier type',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Carrier type term', 'repeatable' => true],
            'b' => ['label' => 'Carrier type code', 'repeatable' => true],
        ],
    ],
    '340' => [
        'label' => 'Physical medium',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Material base and configuration', 'repeatable' => true],
            'b' => ['label' => 'Dimensions', 'repeatable' => true],
            'c' => ['label' => 'Materials applied to surface', 'repeatable' => true],
            'd' => ['label' => 'Information recording technique', 'repeatable' => true],
            'e' => ['label' => 'Support', 'repeatable' => true],
            'f' => ['label' => 'Reduction ratio value', 'repeatable' => true],
            'g' => ['label' => 'Color content', 'repeatable' => true],
            'h' => ['label' => 'Location within medium', 'repeatable' => true],
            'i' => ['label' => 'Technical specifications of medium', 'repeatable' => true],
            'j' => ['label' => 'Generation', 'repeatable' => true],
            'k' => ['label' => 'Layout', 'repeatable' => true],
            'l' => ['label' => 'Binding', 'repeatable' => true],
            'm' => ['label' => 'Book format', 'repeatable' => true],
            'n' => ['label' => 'Font size', 'repeatable' => true],
            'o' => ['label' => 'Polarity', 'repeatable' => true],
            'p' => ['label' => 'Illustrative content', 'repeatable' => true],
            'q' => ['label' => 'Reduction ratio designator', 'repeatable' => true],
        ],
    ],
    '341' => [
        'label' => 'Accessibility content',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Application',
                'values' => [
                    ' ' => 'No information provided',
                    '0' => 'Accessibility information related to primary content',
                    '1' => 'Accessibility information related to secondary content',
                ],
            ],
            2 => [
                'label' => 'Presence of accessibility features/hazards',
                'values' => [
                    ' ' => 'No information provided',
                    '1' => 'Accessibility features present',
                    '2' => 'No accessibility features present',
                    '3' => 'Sensory hazards present',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Dara provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Content access mode', 'repeatable' => false],
            'b' => ['label' => 'Textual assistive features', 'repeatable' => true],
            'c' => ['label' => 'Visual assistive features', 'repeatable' => true],
            'd' => ['label' => 'Auditory assistive features', 'repeatable' => true],
            'e' => ['label' => 'Tactile assistive features', 'repeatable' => true],
            'h' => ['label' => 'Sensory hazards', 'repeatable' => true],
        ],
    ],
    '342' => [
        'label' => 'Geospatial reference data',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Geospatial reference dimension',
                'values' => [
                    '0' => 'Horizontal coordinate system',
                    '1' => 'Vertical coordinate system',
                ],
            ],
            2 => [
                'label' => 'Geospatial reference method',
                'values' => [
                    '0' => 'Geographic',
                    '1' => 'Map projection',
                    '2' => 'Grid coordinate system',
                    '3' => 'Local planar',
                    '4' => 'Local',
                    '5' => 'Geodetic model',
                    '6' => 'Altitude',
                    '7' => 'Method specified in $2',
                    '8' => 'Depth',
                ],
            ],
        ],
        'subfields' => [
            '2' => ['label' => 'Reference method used', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Name', 'repeatable' => false],
            'b' => ['label' => 'Coordinate or distance units', 'repeatable' => false],
            'c' => ['label' => 'Latitude resolution', 'repeatable' => false],
            'd' => ['label' => 'Longitude resolution', 'repeatable' => false],
            'e' => ['label' => 'Standard parallel or oblique line latitude', 'repeatable' => true],
            'f' => ['label' => 'Oblique line longitude', 'repeatable' => true],
            'g' => ['label' => 'Longitude of central meridian or projection center', 'repeatable' => false],
            'h' => ['label' => 'Latitude of projection origin or projection center', 'repeatable' => false],
            'i' => ['label' => 'False easting', 'repeatable' => false],
            'j' => ['label' => 'False northing', 'repeatable' => false],
            'k' => ['label' => 'Scale factor', 'repeatable' => false],
            'l' => ['label' => 'Height of perspective point above surface', 'repeatable' => false],
            'm' => ['label' => 'Azimuthal angle', 'repeatable' => false],
            'n' => ['label' => 'Azimuth measure point longitude or straight vertical longitude from pole', 'repeatable' => false],
            'o' => ['label' => 'Landsat number and path number', 'repeatable' => false],
            'p' => ['label' => 'Zone identifier', 'repeatable' => false],
            'q' => ['label' => 'Ellipsoid name', 'repeatable' => false],
            'r' => ['label' => 'Semi-major axis', 'repeatable' => false],
            's' => ['label' => 'Denominator of flattening ratio', 'repeatable' => false],
            't' => ['label' => 'Vertical resolution', 'repeatable' => false],
            'u' => ['label' => 'Vertical encoding method', 'repeatable' => false],
            'v' => ['label' => 'Local planar, local, or other projection or grid description', 'repeatable' => false],
            'w' => ['label' => 'Local planar or local georeference information', 'repeatable' => false],
        ],
    ],
    '343' => [
        'label' => 'Planar coordinate data',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Planar coordinate encoding method', 'repeatable' => false],
            'b' => ['label' => 'Planar distance units', 'repeatable' => false],
            'c' => ['label' => 'Abscissa resolution', 'repeatable' => false],
            'd' => ['label' => 'Ordinate resolution', 'repeatable' => false],
            'e' => ['label' => 'Distance resolution', 'repeatable' => false],
            'f' => ['label' => 'Bearing resolution', 'repeatable' => false],
            'g' => ['label' => 'Bearing units', 'repeatable' => false],
            'h' => ['label' => 'Bearing reference direction', 'repeatable' => false],
            'i' => ['label' => 'Bearing reference meridian', 'repeatable' => false],
        ],
    ],
    '344' => [
        'label' => 'Sound characteristics',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Type of recording', 'repeatable' => true],
            'b' => ['label' => 'Recording medium', 'repeatable' => true],
            'c' => ['label' => 'Playing speed', 'repeatable' => true],
            'd' => ['label' => 'Groove characteristic', 'repeatable' => true],
            'e' => ['label' => 'Track configuration', 'repeatable' => true],
            'f' => ['label' => 'Tape configuration', 'repeatable' => true],
            'g' => ['label' => 'Configuration of playback channels', 'repeatable' => true],
            'h' => ['label' => 'Special playback characteristics', 'repeatable' => true],
            'i' => ['label' => 'Sound content', 'repeatable' => true],
            'j' => ['label' => 'Original capture and storage technique', 'repeatable' => true],
        ],
    ],
    '345' => [
        'label' => 'Moving image characteristics',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Presentation format', 'repeatable' => true],
            'b' => ['label' => 'Projection speed', 'repeatable' => true],
            'c' => ['label' => 'Aspect ratio value', 'repeatable' => true],
            'd' => ['label' => 'Aspect ratio designator', 'repeatable' => true],
        ],
    ],
    '346' => [
        'label' => 'Video characteristics',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Video format', 'repeatable' => true],
            'b' => ['label' => 'Broadcast standard', 'repeatable' => true],
        ],
    ],
    '347' => [
        'label' => 'Digital file characteristics',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'File type', 'repeatable' => true],
            'b' => ['label' => 'Encoding format', 'repeatable' => true],
            'c' => ['label' => 'File size', 'repeatable' => true],
            'd' => ['label' => 'Resolution', 'repeatable' => true],
            'e' => ['label' => 'Regional encoding', 'repeatable' => true],
            'f' => ['label' => 'Encoded bitrate', 'repeatable' => true],
        ],
    ],
    '348' => [
        'label' => 'Notated music characteristics',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of term', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Format of notated music term', 'repeatable' => true],
            'b' => ['label' => 'Format of notated music code', 'repeatable' => true],
            'c' => ['label' => 'Form of musical notation term', 'repeatable' => true],
            'd' => ['label' => 'Form of musical notation code', 'repeatable' => true],
        ],
    ],
    '351' => [
        'label' => 'Organization and arrangement of materials',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Organization', 'repeatable' => true],
            'b' => ['label' => 'Arrangement', 'repeatable' => true],
            'c' => ['label' => 'Hierarchical level', 'repeatable' => false],
        ],
    ],
    '352' => [
        'label' => 'Digital graphic representation',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Direct reference method', 'repeatable' => false],
            'b' => ['label' => 'Object type', 'repeatable' => true],
            'c' => ['label' => 'Object count', 'repeatable' => true],
            'd' => ['label' => 'Row count', 'repeatable' => false],
            'e' => ['label' => 'Column count', 'repeatable' => false],
            'f' => ['label' => 'Vertical count', 'repeatable' => false],
            'g' => ['label' => 'VPF topology level', 'repeatable' => false],
            'i' => ['label' => 'Indirect reference description', 'repeatable' => false],
            'q' => ['label' => 'Format of the digital image', 'repeatable' => true],
        ],
    ],
    '353' => [
        'label' => 'Supplementary content characteristics',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Supplementary content term', 'repeatable' => true],
            'b' => ['label' => 'Supplementary content code', 'repeatable' => true],
        ],
    ],
    '355' => [
        'label' => 'Security classification control',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Controlled element',
                'values' => [
                    '0' => 'Document',
                    '1' => 'Title',
                    '2' => 'Abstract',
                    '3' => 'Contents note',
                    '4' => 'Author',
                    '5' => 'Record',
                    '8' => 'Other element',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Security classification', 'repeatable' => false],
            'b' => ['label' => 'Handling instructions', 'repeatable' => true],
            'c' => ['label' => 'External dissemination information', 'repeatable' => true],
            'd' => ['label' => 'Downgrading or declassification event', 'repeatable' => false],
            'e' => ['label' => 'Classification system', 'repeatable' => false],
            'f' => ['label' => 'Country of origin code', 'repeatable' => false],
            'g' => ['label' => 'Downgrading date', 'repeatable' => false],
            'h' => ['label' => 'Declassification date', 'repeatable' => false],
            'j' => ['label' => 'Authorization', 'repeatable' => true],
        ],
    ],
    '357' => [
        'label' => 'Originator dissemination control',
        'repeatable' => false,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Originator control term', 'repeatable' => false],
            'b' => ['label' => 'Originating agency', 'repeatable' => true],
            'c' => ['label' => 'Authorized recipients of material', 'repeatable' => true],
            'g' => ['label' => 'Other restrictions', 'repeatable' => true],
        ],
    ],
    '361' => [
        'label' => 'Structured ownership and custodial history',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Privacy',
                'values' => [
                    ' ' => 'No information provided',
                    '0' => 'Private',
                    '1' => 'Not private',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Name', 'repeatable' => false],
            'f' => ['label' => 'Ownership and custodial history evidence term', 'repeatable' => true],
            'k' => ['label' => 'Formatted date', 'repeatable' => false],
            'l' => ['label' => 'Date', 'repeatable' => false],
            'o' => ['label' => 'Type of ownership and custodial history information', 'repeatable' => true],
            's' => ['label' => 'Shelf mark of copy described', 'repeatable' => false],
            'u' => ['label' => 'Uniform Resource Identifier', 'repeatable' => true],
            'x' => ['label' => 'Nonpublic note', 'repeatable' => true],
            'y' => ['label' => 'Identifier of the copy described', 'repeatable' => false],
            'z' => ['label' => 'Public note', 'repeatable' => true],
        ],
    ],
    '362' => [
        'label' => 'Dates of publication and/or sequential designation',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Format of date',
                'values' => [
                    '0' => 'Formatted style',
                    '1' => 'Unformatted note',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Dates of publication and/or sequential designation', 'repeatable' => false],
            'z' => ['label' => 'Source of information', 'repeatable' => false],
        ],
    ],
    '363' => [
        'label' => 'Normalized date and sequential designation',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Start/End designator',
                'values' => [
                    ' ' => 'No information provided',
                    '0' => 'Starting information',
                    '1' => 'Ending information',
                ],
            ],
            2 => [
                'label' => 'State of issuance',
                'values' => [
                    ' ' => 'Not specified',
                    '0' => 'Closed',
                    '1' => 'Open',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => false],
            'a' => ['label' => 'First level of enumeration', 'repeatable' => false],
            'b' => ['label' => 'Second level of enumeration', 'repeatable' => false],
            'c' => ['label' => 'Third level of enumeration', 'repeatable' => false],
            'd' => ['label' => 'Fourth level of enumeration', 'repeatable' => false],
            'e' => ['label' => 'Fifth level of enumeration', 'repeatable' => false],
            'f' => ['label' => 'Sixth level of enumeration', 'repeatable' => false],
            'g' => ['label' => 'Alternative numbering scheme, first level of enumeration', 'repeatable' => false],
            'h' => ['label' => 'Alternative numbering scheme, second level of enumeration', 'repeatable' => false],
            'i' => ['label' => 'First level of chronology', 'repeatable' => false],
            'j' => ['label' => 'Second level of chronology', 'repeatable' => false],
            'k' => ['label' => 'Third level of chronology', 'repeatable' => false],
            'l' => ['label' => 'Fourth level of chronology', 'repeatable' => false],
            'm' => ['label' => 'Alternative numbering scheme, chronology', 'repeatable' => false],
            'u' => ['label' => 'First level textual designation', 'repeatable' => false],
            'v' => ['label' => 'First level of chronology, issuance', 'repeatable' => false],
            'x' => ['label' => 'Nonpublic note', 'repeatable' => true],
            'z' => ['label' => 'Public note', 'repeatable' => true],
        ],
    ],
    '365' => [
        'label' => 'Trade price',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '2' => ['label' => 'Source of price type code', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Price type code', 'repeatable' => false],
            'b' => ['label' => 'Price amount', 'repeatable' => false],
            'c' => ['label' => 'Currency code', 'repeatable' => false],
            'd' => ['label' => 'Unit of pricing', 'repeatable' => false],
            'e' => ['label' => 'Price note', 'repeatable' => false],
            'f' => ['label' => 'Price effective from', 'repeatable' => false],
            'g' => ['label' => 'Price effective until', 'repeatable' => false],
            'h' => ['label' => 'Tax rate 1', 'repeatable' => false],
            'i' => ['label' => 'Tax rate 2', 'repeatable' => false],
            'j' => ['label' => 'ISO country code', 'repeatable' => false],
            'k' => ['label' => 'MARC country code', 'repeatable' => false],
            'm' => ['label' => 'Identification of pricing entity', 'repeatable' => false],
        ],
    ],
    '366' => [
        'label' => 'Trade availability information',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '2' => ['label' => 'Source of availability status code', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Publishers\' compressed title identification', 'repeatable' => false],
            'b' => ['label' => 'Detailed date of publication', 'repeatable' => false],
            'c' => ['label' => 'Availability status code', 'repeatable' => false],
            'd' => ['label' => 'Expected next availability date', 'repeatable' => false],
            'e' => ['label' => 'Note', 'repeatable' => false],
            'f' => ['label' => 'Publishers\' discount category', 'repeatable' => false],
            'g' => ['label' => 'Date made out of print', 'repeatable' => false],
            'j' => ['label' => 'ISO country code', 'repeatable' => false],
            'k' => ['label' => 'MARC country code', 'repeatable' => false],
            'm' => ['label' => 'Identification of agency', 'repeatable' => false],
        ],
    ],
    '370' => [
        'label' => 'Associated place',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of term', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'c' => ['label' => 'Associated country', 'repeatable' => true],
            'f' => ['label' => 'Other associated place', 'repeatable' => true],
            'g' => ['label' => 'Place of origin of work or expression', 'repeatable' => true],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            's' => ['label' => 'Start period', 'repeatable' => false],
            't' => ['label' => 'End period', 'repeatable' => false],
            'u' => ['label' => 'Uniform Resource Identifier', 'repeatable' => true],
            'v' => ['label' => 'Source of information', 'repeatable' => true],
        ],
    ],
    '377' => [
        'label' => 'Associated language',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Source of code',
                'values' => [
                    ' ' => 'MARC language code',
                    '7' => 'Source specified in subfield $2',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Language code', 'repeatable' => true],
            'l' => ['label' => 'Language term', 'repeatable' => true],
        ],
    ],
    '380' => [
        'label' => 'Form of work',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of term', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Form of work', 'repeatable' => true],
        ],
    ],
    '381' => [
        'label' => 'Other distinguishing characteristics of work or expression',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of term', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Other distinguishing characteristic', 'repeatable' => true],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'u' => ['label' => 'Uniform Resource Identifier', 'repeatable' => true],
            'v' => ['label' => 'Source of information', 'repeatable' => true],
        ],
    ],
    '382' => [
        'label' => 'Medium of performance',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Display constant controller',
                'values' => [
                    ' ' => 'No information provided',
                    '0' => 'Medium of performance',
                    '1' => 'Partial medium of performance',
                    '2' => 'Medium of performance of musical content of representative expression',
                    '3' => 'Partial medium of performance of musical content of representative expression',
                ],
            ],
            2 => [
                'label' => 'Access control',
                'values' => [
                    ' ' => 'No information provided',
                    '0' => 'Not intended for access',
                    '1' => 'Intended for access',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of term', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Medium of performance', 'repeatable' => true],
            'b' => ['label' => 'Soloist', 'repeatable' => true],
            'd' => ['label' => 'Doubling instrument', 'repeatable' => true],
            'e' => ['label' => 'Number of ensembles of the same type', 'repeatable' => true],
            'n' => ['label' => 'Number of performers of the same medium', 'repeatable' => true],
            'p' => ['label' => 'Alternative medium of performance', 'repeatable' => true],
            'r' => ['label' => 'Total number of individuals performing alongside ensembles', 'repeatable' => false],
            's' => ['label' => 'Total number of performers', 'repeatable' => false],
            't' => ['label' => 'Total number of ensembles', 'repeatable' => false],
            'v' => ['label' => 'Note', 'repeatable' => true],
        ],
    ],
    '383' => [
        'label' => 'Numeric designation of musical work or expression',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Type of entity',
                'values' => [
                    ' ' => 'No information provided',
                    '0' => 'Work',
                    '1' => 'Expression',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '2' => ['label' => 'Source', 'repeatable' => false],
            '3' => ['label' => 'Materials secified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Serial number', 'repeatable' => true],
            'b' => ['label' => 'Opus number', 'repeatable' => true],
            'c' => ['label' => 'Thematic index number', 'repeatable' => true],
            'd' => ['label' => 'Thematic index code', 'repeatable' => false],
            'e' => ['label' => 'Publisher associated with opus number', 'repeatable' => false],
        ],
    ],
    '384' => [
        'label' => 'Key',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Key type',
                'values' => [
                    ' ' => 'Relationship to original unknown',
                    '0' => 'Original key',
                    '1' => 'Transposed key',
                    '2' => 'Key of representative expression',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Key', 'repeatable' => false],
        ],
    ],
    '385' => [
        'label' => 'Audience characteristics',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Audience term', 'repeatable' => true],
            'b' => ['label' => 'Audience code', 'repeatable' => true],
            'm' => ['label' => 'Demographic group term', 'repeatable' => false],
            'n' => ['label' => 'Demographic group code', 'repeatable' => false],
        ],
    ],
    '386' => [
        'label' => 'Creator/contributor characteristics',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Creator/contributor term', 'repeatable' => true],
            'b' => ['label' => 'Creator/contributor code', 'repeatable' => true],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'm' => ['label' => 'Demographic group term', 'repeatable' => false],
            'n' => ['label' => 'Demographic group code', 'repeatable' => false],
        ],
    ],
    '387' => [
        'label' => 'Representative expression characteristics',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of term', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Aspect ratio of representative expression', 'repeatable' => true],
            'b' => ['label' => 'Color content of representative expression', 'repeatable' => true],
            'c' => ['label' => 'Content type of representative expression', 'repeatable' => true],
            'd' => ['label' => 'Date of capture of representative expression', 'repeatable' => true],
            'e' => ['label' => 'Date of representative expression', 'repeatable' => true],
            'f' => ['label' => 'Duration of representative expression', 'repeatable' => true],
            'g' => ['label' => 'Intended audience of representative expression', 'repeatable' => true],
            'h' => ['label' => 'Language of representative expression', 'repeatable' => true],
            'i' => ['label' => 'Place of capture of representative expression', 'repeatable' => true],
            'j' => ['label' => 'Projection of cartographic content of representative expression', 'repeatable' => true],
            'k' => ['label' => 'Scale of representative expression', 'repeatable' => true],
            'l' => ['label' => 'Script of representative expression', 'repeatable' => true],
            'm' => ['label' => 'Sound content of representative expression', 'repeatable' => true],
        ],
    ],
    '388' => [
        'label' => 'Time period of creation',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Type of time period',
                'values' => [
                    ' ' => 'No information provided',
                    '1' => 'Creation of work',
                    '2' => 'Creation of aggregate work',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of term', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Time period of creation term', 'repeatable' => true],
        ],
    ],
    '440' => [
        'label' => 'Series statement/added entry--title',
        'repeatable' => true,
        'indicators' => [],
        'subfields' => [
            '0' => ['label' => 'Authority record control number', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Title', 'repeatable' => false],
            'n' => ['label' => 'Number of part/section of a work', 'repeatable' => true],
            'p' => ['label' => 'Name of part/section of a work', 'repeatable' => true],
            'v' => ['label' => 'Volume/sequential designation', 'repeatable' => false],
            'w' => ['label' => 'Bibliographic record control number', 'repeatable' => true],
            'x' => ['label' => 'International Standard Serial Number', 'repeatable' => false],
        ],
    ],
    '490' => [
        'label' => 'Series statement',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Series tracing policy',
                'values' => [
                    '0' => 'Series not traced',
                    '1' => 'Series traced [REDEFINED]',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Series statement', 'repeatable' => true],
            'l' => ['label' => 'Library of Congress call number', 'repeatable' => false],
            'v' => ['label' => 'Volume number/sequential designation', 'repeatable' => true],
            'x' => ['label' => 'International Standard Serial Number', 'repeatable' => true],
            'y' => ['label' => 'Incorrect ISSN', 'repeatable' => true],
            'z' => ['label' => 'Canceled ISSN', 'repeatable' => true],
        ],
    ],
    '500' => [
        'label' => 'General note',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'General note', 'repeatable' => false],
        ],
    ],
    '501' => [
        'label' => 'With note',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'With note', 'repeatable' => false],
        ],
    ],
    '502' => [
        'label' => 'Dissertation note',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Dissertation note', 'repeatable' => false],
            'b' => ['label' => 'Degree type', 'repeatable' => false],
            'c' => ['label' => 'Name of granting institution', 'repeatable' => false],
            'd' => ['label' => 'Year of degree granted', 'repeatable' => false],
            'g' => ['label' => 'Miscellaneous information', 'repeatable' => true],
            'o' => ['label' => 'Dissertation identifier', 'repeatable' => true],
        ],
    ],
    '504' => [
        'label' => 'Bibliography, etc. note',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Bibliography, etc. note', 'repeatable' => false],
            'b' => ['label' => 'Number of references', 'repeatable' => false],
        ],
    ],
    '505' => [
        'label' => 'Formatted contents note',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Display constant controller',
                'values' => [
                    '0' => 'Contents',
                    '1' => 'Incomplete contents',
                    '2' => 'Partial contents',
                    '8' => 'No display constant generated',
                ],
            ],
            2 => [
                'label' => 'Level of content designation',
                'values' => [
                    ' ' => 'Basic',
                    '0' => 'Enhanced',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Formatted contents note', 'repeatable' => false],
            'g' => ['label' => 'Miscellaneous information', 'repeatable' => true],
            'r' => ['label' => 'Statement of responsibility', 'repeatable' => true],
            't' => ['label' => 'Title', 'repeatable' => true],
            'u' => ['label' => 'Uniform Resource Identifier', 'repeatable' => true],
        ],
    ],
    '506' => [
        'label' => 'Restrictions on access note',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Restriction',
                'values' => [
                    ' ' => 'No information provided',
                    '0' => 'No restrictions',
                    '1' => 'Restrictions apply',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of term', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Terms governing access', 'repeatable' => false],
            'b' => ['label' => 'Jurisdiction', 'repeatable' => true],
            'c' => ['label' => 'Physical access provisions', 'repeatable' => true],
            'd' => ['label' => 'Authorized users', 'repeatable' => true],
            'e' => ['label' => 'Authorization', 'repeatable' => true],
            'f' => ['label' => 'Standardized terminology for access restriction', 'repeatable' => true],
            'g' => ['label' => 'Availability date', 'repeatable' => true],
            'q' => ['label' => 'Supplying agency', 'repeatable' => true],
            'u' => ['label' => 'Uniform Resource Identifier', 'repeatable' => true],
        ],
    ],
    '507' => [
        'label' => 'Scale note for visual materials',
        'repeatable' => false,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Representative fraction of scale note', 'repeatable' => false],
            'b' => ['label' => 'Remainder of scale note', 'repeatable' => false],
        ],
    ],
    '508' => [
        'label' => 'Creation/production credits note',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Creation/production credits note', 'repeatable' => false],
        ],
    ],
    '510' => [
        'label' => 'Citation/references note',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Coverage/location in source',
                'values' => [
                    '0' => 'Coverage unknown',
                    '1' => 'Coverage complete',
                    '2' => 'Coverage is selective',
                    '3' => 'Location in source not given',
                    '4' => 'Location in source given',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Name of source', 'repeatable' => false],
            'b' => ['label' => 'Coverage of source', 'repeatable' => false],
            'c' => ['label' => 'Location within source', 'repeatable' => false],
            'u' => ['label' => 'Uniform Resource Identifier', 'repeatable' => true],
            'x' => ['label' => 'International Standard Serial Number', 'repeatable' => false],
        ],
    ],
    '511' => [
        'label' => 'Participant or performer note',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Display constant controller',
                'values' => [
                    '0' => 'No display constant generated',
                    '1' => 'Cast',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Participant or performer note', 'repeatable' => false],
        ],
    ],
    '513' => [
        'label' => 'Type of report and period covered note',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Type of report', 'repeatable' => false],
            'b' => ['label' => 'Period covered', 'repeatable' => false],
        ],
    ],
    '514' => [
        'label' => 'Data quality note',
        'repeatable' => false,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Attribute accuracy report', 'repeatable' => false],
            'b' => ['label' => 'Attribute accuracy value', 'repeatable' => true],
            'c' => ['label' => 'Attribute accuracy explanation', 'repeatable' => true],
            'd' => ['label' => 'Logical consistency report', 'repeatable' => false],
            'e' => ['label' => 'Completeness report', 'repeatable' => false],
            'f' => ['label' => 'Horizontal position accuracy report', 'repeatable' => false],
            'g' => ['label' => 'Horizontal position accuracy value', 'repeatable' => true],
            'h' => ['label' => 'Horizontal position accuracy explanation', 'repeatable' => true],
            'i' => ['label' => 'Vertical positional accuracy report', 'repeatable' => false],
            'j' => ['label' => 'Vertical positional accuracy value', 'repeatable' => true],
            'k' => ['label' => 'Vertical positional accuracy explanation', 'repeatable' => true],
            'm' => ['label' => 'Cloud cover', 'repeatable' => false],
            'u' => ['label' => 'Uniform Resource Identifier', 'repeatable' => true],
            'z' => ['label' => 'Display note', 'repeatable' => true],
        ],
    ],
    '515' => [
        'label' => 'Numbering peculiarities note',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Numbering peculiarities note', 'repeatable' => false],
        ],
    ],
    '516' => [
        'label' => 'Type of computer file or data note',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Display constant controller',
                'values' => [
                    ' ' => 'Type of file',
                    '8' => 'No display constant generated',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Type of computer file or data note', 'repeatable' => false],
        ],
    ],
    '518' => [
        'label' => 'Date/time and place of an event note',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of term', 'repeatable' => true],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Date/time and place of an event note', 'repeatable' => false],
            'd' => ['label' => 'Date of event', 'repeatable' => true],
            'o' => ['label' => 'Other event information', 'repeatable' => true],
            'p' => ['label' => 'Place of event', 'repeatable' => true],
        ],
    ],
    '520' => [
        'label' => 'Summary, etc.',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Display constant controller',
                'values' => [
                    ' ' => 'Summary',
                    '0' => 'Subject',
                    '1' => 'Review',
                    '2' => 'Scope and content',
                    '3' => 'Abstract',
                    '4' => 'Content advice',
                    '8' => 'No display constant generated',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '2' => ['label' => 'Source', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Summary, etc. note', 'repeatable' => false],
            'b' => ['label' => 'Expansion of summary note', 'repeatable' => false],
            'c' => ['label' => 'Assigning agency', 'repeatable' => false],
            'u' => ['label' => 'Uniform Resource Identifier', 'repeatable' => true],
        ],
    ],
    '521' => [
        'label' => 'Target audience note',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Display constant controller',
                'values' => [
                    ' ' => 'Audience',
                    '0' => 'Reading grade level',
                    '1' => 'Interest age level',
                    '2' => 'Interest grade level',
                    '3' => 'Special audience characteristics',
                    '4' => 'Motivation interest level',
                    '8' => 'No display constant generated',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Target audience note', 'repeatable' => true],
            'b' => ['label' => 'Source', 'repeatable' => false],
        ],
    ],
    '522' => [
        'label' => 'Geographic coverage note',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Display constant controller',
                'values' => [
                    ' ' => 'Geographic coverage',
                    '8' => 'No display constant generated',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Geographic coverage note', 'repeatable' => false],
        ],
    ],
    '524' => [
        'label' => 'Preferred citation of described materials note',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Display constant controller',
                'values' => [
                    ' ' => 'Cite as',
                    '8' => 'No display constant generated',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '2' => ['label' => 'Source of schema used', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Preferred citation of described materials note', 'repeatable' => false],
        ],
    ],
    '525' => [
        'label' => 'Supplement note',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Supplement note', 'repeatable' => false],
        ],
    ],
    '526' => [
        'label' => 'Study program information note',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Display constant controller',
                'values' => [
                    '0' => 'Reading program',
                    '8' => 'No display constant generated',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Program name', 'repeatable' => false],
            'b' => ['label' => 'Interest level', 'repeatable' => false],
            'c' => ['label' => 'Reading level', 'repeatable' => false],
            'd' => ['label' => 'Title point value', 'repeatable' => false],
            'i' => ['label' => 'Display text', 'repeatable' => false],
            'x' => ['label' => 'Nonpublic note', 'repeatable' => true],
            'z' => ['label' => 'Public note', 'repeatable' => true],
        ],
    ],
    '530' => [
        'label' => 'Additional physical form available note',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Additional physical form available note', 'repeatable' => false],
            'b' => ['label' => 'Availability source', 'repeatable' => false],
            'c' => ['label' => 'Availability conditions', 'repeatable' => false],
            'd' => ['label' => 'Order number', 'repeatable' => false],
            'u' => ['label' => 'Uniform Resource Identifier', 'repeatable' => true],
        ],
    ],
    '532' => [
        'label' => 'Accessibility note',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Display constant controller',
                'values' => [
                    '0' => 'Accessibility technical details',
                    '1' => 'Accessibility features',
                    '2' => 'Accessibility deficiencies',
                    '8' => 'No display constant generated',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Summary of accessibility', 'repeatable' => false],
        ],
    ],
    '533' => [
        'label' => 'Reproduction note',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Fixed-length data elements of reproduction', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Type of reproduction', 'repeatable' => false],
            'b' => ['label' => 'Place of reproduction', 'repeatable' => true],
            'c' => ['label' => 'Agency responsible for reproduction', 'repeatable' => true],
            'd' => ['label' => 'Date of reproduction', 'repeatable' => false],
            'e' => ['label' => 'Physical description of reproduction', 'repeatable' => false],
            'f' => ['label' => 'Series statement of reproduction', 'repeatable' => true],
            'm' => ['label' => 'Dates and/or sequential designation of issues reproduced', 'repeatable' => true],
            'n' => ['label' => 'Note about reproduction', 'repeatable' => true],
            'y' => ['label' => 'Data provenance', 'repeatable' => true],
        ],
    ],
    '534' => [
        'label' => 'Original version note',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Main entry of original', 'repeatable' => false],
            'b' => ['label' => 'Edition statement of original', 'repeatable' => false],
            'c' => ['label' => 'Publication, distribution, etc. of original', 'repeatable' => false],
            'e' => ['label' => 'Physical description, etc. of original', 'repeatable' => false],
            'f' => ['label' => 'Series statement of original', 'repeatable' => true],
            'k' => ['label' => 'Key title of original', 'repeatable' => true],
            'l' => ['label' => 'Location of original', 'repeatable' => false],
            'm' => ['label' => 'Material specific details', 'repeatable' => false],
            'n' => ['label' => 'Note about original', 'repeatable' => true],
            'o' => ['label' => 'Other resource identifier', 'repeatable' => true],
            'p' => ['label' => 'Introductory phrase', 'repeatable' => false],
            't' => ['label' => 'Title statement of original', 'repeatable' => false],
            'x' => ['label' => 'International Standard Serial Number', 'repeatable' => true],
            'z' => ['label' => 'International Standard Book Number', 'repeatable' => true],
        ],
    ],
    '535' => [
        'label' => 'Location of originals/duplicates note',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Additional information about custodian',
                'values' => [
                    '1' => 'Holder of originals',
                    '2' => 'Holder of duplicates',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Custodian', 'repeatable' => false],
            'b' => ['label' => 'Postal address', 'repeatable' => true],
            'c' => ['label' => 'Country', 'repeatable' => true],
            'd' => ['label' => 'Telecommunications address', 'repeatable' => true],
            'g' => ['label' => 'Repository location code', 'repeatable' => false],
        ],
    ],
    '536' => [
        'label' => 'Funding information note',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Text of note', 'repeatable' => false],
            'b' => ['label' => 'Contract number', 'repeatable' => true],
            'c' => ['label' => 'Grant number', 'repeatable' => true],
            'd' => ['label' => 'Undifferentiated number', 'repeatable' => true],
            'e' => ['label' => 'Program element number', 'repeatable' => true],
            'f' => ['label' => 'Project number', 'repeatable' => true],
            'g' => ['label' => 'Task number', 'repeatable' => true],
            'h' => ['label' => 'Work unit number', 'repeatable' => true],
        ],
    ],
    '538' => [
        'label' => 'System details note',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'System details note', 'repeatable' => false],
            'i' => ['label' => 'Display text', 'repeatable' => false],
            'u' => ['label' => 'Uniform Resource Identifier', 'repeatable' => true],
        ],
    ],
    '540' => [
        'label' => 'Terms governing use and reproduction note',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of term', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Terms governing use and reproduction', 'repeatable' => false],
            'b' => ['label' => 'Jurisdiction', 'repeatable' => false],
            'c' => ['label' => 'Authorization', 'repeatable' => false],
            'd' => ['label' => 'Authorized users', 'repeatable' => false],
            'f' => ['label' => 'Standardized terminology for use and reproduction rights', 'repeatable' => true],
            'g' => ['label' => 'Availability date', 'repeatable' => true],
            'q' => ['label' => 'Supplying agency', 'repeatable' => false],
            'u' => ['label' => 'Uniform Resource Identifier', 'repeatable' => true],
        ],
    ],
    '541' => [
        'label' => 'Immediate source of acquisition note',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Privacy',
                'values' => [
                    ' ' => 'No information provided',
                    '0' => 'Private',
                    '1' => 'Not private',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Source of acquisition', 'repeatable' => false],
            'b' => ['label' => 'Address', 'repeatable' => false],
            'c' => ['label' => 'Method of acquisition', 'repeatable' => false],
            'd' => ['label' => 'Date of acquisition', 'repeatable' => false],
            'e' => ['label' => 'Accession number', 'repeatable' => false],
            'f' => ['label' => 'Owner', 'repeatable' => false],
            'h' => ['label' => 'Purchase price', 'repeatable' => false],
            'n' => ['label' => 'Extent', 'repeatable' => true],
            'o' => ['label' => 'Type of unit', 'repeatable' => true],
        ],
    ],
    '542' => [
        'label' => 'Information relating to copyright status',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Privacy',
                'values' => [
                    ' ' => 'No information provided',
                    '0' => 'Private',
                    '1' => 'Not private',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Personal creator', 'repeatable' => false],
            'b' => ['label' => 'Personal creator death date', 'repeatable' => false],
            'c' => ['label' => 'Corporate creator', 'repeatable' => false],
            'd' => ['label' => 'Copyright holder', 'repeatable' => true],
            'e' => ['label' => 'Copyright holder contact information', 'repeatable' => true],
            'f' => ['label' => 'Copyright statement', 'repeatable' => true],
            'g' => ['label' => 'Copyright date', 'repeatable' => false],
            'h' => ['label' => 'Copyright renewal date', 'repeatable' => true],
            'i' => ['label' => 'Publication date', 'repeatable' => false],
            'j' => ['label' => 'Creation date', 'repeatable' => false],
            'k' => ['label' => 'Publisher', 'repeatable' => true],
            'l' => ['label' => 'Copyright status', 'repeatable' => false],
            'm' => ['label' => 'Publication status', 'repeatable' => false],
            'n' => ['label' => 'Note', 'repeatable' => true],
            'o' => ['label' => 'Research date', 'repeatable' => false],
            'p' => ['label' => 'Country of publication or creation', 'repeatable' => true],
            'q' => ['label' => 'Supplying agency', 'repeatable' => false],
            'r' => ['label' => 'Jurisdiction of copyright assessment', 'repeatable' => false],
            's' => ['label' => 'Source of information', 'repeatable' => false],
            'u' => ['label' => 'Uniform Resource Identifier', 'repeatable' => true],
        ],
    ],
    '544' => [
        'label' => 'Location of other archival materials note',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Relationship',
                'values' => [
                    ' ' => 'No information provided',
                    '0' => 'Associated materials',
                    '1' => 'Related materials',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Custodian', 'repeatable' => true],
            'b' => ['label' => 'Address', 'repeatable' => true],
            'c' => ['label' => 'Country', 'repeatable' => true],
            'd' => ['label' => 'Title', 'repeatable' => true],
            'e' => ['label' => 'Provenance', 'repeatable' => true],
            'n' => ['label' => 'Note', 'repeatable' => true],
        ],
    ],
    '545' => [
        'label' => 'Biographical or historical data',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Type of data',
                'values' => [
                    ' ' => 'No information provided',
                    '0' => 'Biographical sketch',
                    '1' => 'Administrative history',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Biographical or historical note', 'repeatable' => false],
            'b' => ['label' => 'Expansion', 'repeatable' => false],
            'u' => ['label' => 'Uniform Resource Identifier', 'repeatable' => true],
        ],
    ],
    '546' => [
        'label' => 'Language note',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Language note', 'repeatable' => false],
            'b' => ['label' => 'Information code or alphabet', 'repeatable' => true],
        ],
    ],
    '547' => [
        'label' => 'Former title complexity note',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Former title complexity note', 'repeatable' => false],
        ],
    ],
    '550' => [
        'label' => 'Issuing body note',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Issuing body note', 'repeatable' => false],
        ],
    ],
    '552' => [
        'label' => 'Entity and attribute information note',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Entity type label', 'repeatable' => false],
            'b' => ['label' => 'Entity type definition and source', 'repeatable' => false],
            'c' => ['label' => 'Attribute label', 'repeatable' => false],
            'd' => ['label' => 'Attribute definition and source', 'repeatable' => false],
            'e' => ['label' => 'Enumerated domain value', 'repeatable' => true],
            'f' => ['label' => 'Enumerated domain value definition and source', 'repeatable' => true],
            'g' => ['label' => 'Range domain minimum and maximum', 'repeatable' => false],
            'h' => ['label' => 'Codeset name and source', 'repeatable' => false],
            'i' => ['label' => 'Unrepresentable domain', 'repeatable' => false],
            'j' => ['label' => 'Attribute units of measurement and resolution', 'repeatable' => false],
            'k' => ['label' => 'Beginning date and ending date of attribute values', 'repeatable' => false],
            'l' => ['label' => 'Attribute value accuracy', 'repeatable' => false],
            'm' => ['label' => 'Attribute value accuracy explanation', 'repeatable' => false],
            'n' => ['label' => 'Attribute measurement frequency', 'repeatable' => false],
            'o' => ['label' => 'Entity and attribute overview', 'repeatable' => true],
            'p' => ['label' => 'Entity and attribute detail citation', 'repeatable' => true],
            'u' => ['label' => 'Uniform Resource Identifier', 'repeatable' => true],
            'z' => ['label' => 'Display note', 'repeatable' => true],
        ],
    ],
    '555' => [
        'label' => 'Cumulative index/finding aids note',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Display constant controller',
                'values' => [
                    ' ' => 'Indexes',
                    '0' => 'Finding aids',
                    '8' => 'No display constant generated',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Cumulative index/finding aids note', 'repeatable' => false],
            'b' => ['label' => 'Availability source', 'repeatable' => true],
            'c' => ['label' => 'Degree of control', 'repeatable' => false],
            'd' => ['label' => 'Bibliographic reference', 'repeatable' => false],
            'u' => ['label' => 'Uniform Resource Identifier', 'repeatable' => true],
        ],
    ],
    '556' => [
        'label' => 'Information about documentation note',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Display constant controller',
                'values' => [
                    ' ' => 'Documentation',
                    '8' => 'No display constant generated',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Information about documentation note', 'repeatable' => false],
            'z' => ['label' => 'International Standard Book Number', 'repeatable' => true],
        ],
    ],
    '561' => [
        'label' => 'Ownership and custodial history',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Privacy',
                'values' => [
                    ' ' => 'No information provided',
                    '0' => 'Private',
                    '1' => 'Not private',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'History', 'repeatable' => false],
            'u' => ['label' => 'Uniform Resource Identifier', 'repeatable' => true],
        ],
    ],
    '562' => [
        'label' => 'Copy and version identification note',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Identifying markings', 'repeatable' => true],
            'b' => ['label' => 'Copy identification', 'repeatable' => true],
            'c' => ['label' => 'Version identification', 'repeatable' => true],
            'd' => ['label' => 'Presentation format', 'repeatable' => true],
            'e' => ['label' => 'Number of copies', 'repeatable' => true],
        ],
    ],
    '563' => [
        'label' => 'Binding information',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Binding note', 'repeatable' => false],
            'u' => ['label' => 'Uniform Resource Identifier', 'repeatable' => true],
        ],
    ],
    '565' => [
        'label' => 'Case file characteristics note',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Display constant controller',
                'values' => [
                    ' ' => 'File size',
                    '0' => 'Case file characteristics',
                    '8' => 'No display constant generated',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Number of cases/variables', 'repeatable' => false],
            'b' => ['label' => 'Name of variable', 'repeatable' => true],
            'c' => ['label' => 'Unit of analysis', 'repeatable' => true],
            'd' => ['label' => 'Universe of data', 'repeatable' => true],
            'e' => ['label' => 'Filing scheme or code', 'repeatable' => true],
        ],
    ],
    '567' => [
        'label' => 'Methodology note',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Display constant controller',
                'values' => [
                    ' ' => 'Methodology',
                    '8' => 'No display constant generated',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of term', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Methodology note', 'repeatable' => false],
            'b' => ['label' => 'Controlled term', 'repeatable' => true],
        ],
    ],
    '580' => [
        'label' => 'Linking entry complexity note',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Linking entry complexity note', 'repeatable' => false],
        ],
    ],
    '581' => [
        'label' => 'Publications about described materials note',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Display constant controller',
                'values' => [
                    ' ' => 'Publications',
                    '8' => 'No display constant generated',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Publications about described materials note', 'repeatable' => false],
            'z' => ['label' => 'International Standard Book Number', 'repeatable' => true],
        ],
    ],
    '583' => [
        'label' => 'Action note',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Privacy',
                'values' => [
                    ' ' => 'No information provided',
                    '0' => 'Private',
                    '1' => 'Not private',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '2' => ['label' => 'Source of term', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Action', 'repeatable' => false],
            'b' => ['label' => 'Action identification', 'repeatable' => true],
            'c' => ['label' => 'Time/date of action', 'repeatable' => true],
            'd' => ['label' => 'Action interval', 'repeatable' => true],
            'e' => ['label' => 'Contingency for action', 'repeatable' => true],
            'f' => ['label' => 'Authorization', 'repeatable' => true],
            'h' => ['label' => 'Jurisdiction', 'repeatable' => true],
            'i' => ['label' => 'Method of action', 'repeatable' => true],
            'j' => ['label' => 'Site of action', 'repeatable' => true],
            'k' => ['label' => 'Action agent', 'repeatable' => true],
            'l' => ['label' => 'Status', 'repeatable' => true],
            'n' => ['label' => 'Extent', 'repeatable' => true],
            'o' => ['label' => 'Type of unit', 'repeatable' => true],
            'u' => ['label' => 'Uniform Resource Identifier', 'repeatable' => true],
            'x' => ['label' => 'Nonpublic note', 'repeatable' => true],
            'z' => ['label' => 'Public note', 'repeatable' => true],
        ],
    ],
    '584' => [
        'label' => 'Accumulation and frequency of use note',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Accumulation', 'repeatable' => true],
            'b' => ['label' => 'Frequency of use', 'repeatable' => true],
        ],
    ],
    '585' => [
        'label' => 'Exhibitions note',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Exhibitions note', 'repeatable' => false],
        ],
    ],
    '586' => [
        'label' => 'Awards note',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Display constant controller',
                'values' => [
                    ' ' => 'Awards',
                    '8' => 'No display constant generated',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Awards note', 'repeatable' => false],
        ],
    ],
    '588' => [
        'label' => 'Source of description note',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Display constant controller',
                'values' => [
                    ' ' => 'No information provided',
                    '0' => 'Source of description',
                    '1' => 'Latest issue consulted',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Source of description note', 'repeatable' => false],
        ],
    ],
    '600' => [
        'label' => 'Subject added entry--personal name',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Type of personal name entry element',
                'values' => [
                    '0' => 'Forename',
                    '1' => 'Surname',
                    '3' => 'Family name',
                ],
            ],
            2 => [
                'label' => 'Thesaurus',
                'values' => [
                    '0' => 'Library of Congress Subject Headings',
                    '1' => 'Library of Congress Children\'s and Young Adults\' Subject Headings',
                    '2' => 'Medical Subject Headings',
                    '3' => 'National Agricultural Library subject authority file',
                    '4' => 'Source not specified',
                    '5' => 'Canadian Subject Headings',
                    '6' => 'Répertoire de vedettes-matière',
                    '7' => 'Source specified in subfield $2',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of heading or term', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Personal name', 'repeatable' => false],
            'b' => ['label' => 'Numeration', 'repeatable' => false],
            'c' => ['label' => 'Titles and other words associated with a name', 'repeatable' => true],
            'd' => ['label' => 'Dates associated with a name', 'repeatable' => false],
            'e' => ['label' => 'Relator term', 'repeatable' => true],
            'f' => ['label' => 'Date of a work', 'repeatable' => false],
            'g' => ['label' => 'Miscellaneous information', 'repeatable' => true],
            'h' => ['label' => 'Medium', 'repeatable' => false],
            'j' => ['label' => 'Attribution qualifier', 'repeatable' => true],
            'k' => ['label' => 'Form subheading', 'repeatable' => true],
            'l' => ['label' => 'Language of a work', 'repeatable' => false],
            'm' => ['label' => 'Medium of performance for music', 'repeatable' => true],
            'n' => ['label' => 'Number of part/section of a work', 'repeatable' => true],
            'o' => ['label' => 'Arranged statement for music', 'repeatable' => false],
            'p' => ['label' => 'Name of part/section of a work', 'repeatable' => true],
            'q' => ['label' => 'Fuller form of name', 'repeatable' => false],
            'r' => ['label' => 'Key for music', 'repeatable' => false],
            's' => ['label' => 'Version', 'repeatable' => true],
            't' => ['label' => 'Title of a work', 'repeatable' => false],
            'u' => ['label' => 'Affiliation', 'repeatable' => false],
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '610' => [
        'label' => 'Subject added entry--corporate name',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Type of corporate name entry element',
                'values' => [
                    '0' => 'Inverted name',
                    '1' => 'Jurisdiction name',
                    '2' => 'Name in direct order',
                ],
            ],
            2 => [
                'label' => 'Thesaurus',
                'values' => [
                    '0' => 'Library of Congress Subject Headings',
                    '1' => 'Library of Congress Children\'s and Young Adults\' Subject Headings',
                    '2' => 'Medical Subject Headings',
                    '3' => 'National Agricultural Library subject authority file',
                    '4' => 'Source not specified',
                    '5' => 'Canadian Subject Headings',
                    '6' => 'Répertoire de vedettes-matière',
                    '7' => 'Source specified in subfield $2',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of heading or term', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Corporate name or jurisdiction name as entry element', 'repeatable' => false],
            'b' => ['label' => 'Subordinate unit', 'repeatable' => true],
            'c' => ['label' => 'Location of meeting', 'repeatable' => true],
            'd' => ['label' => 'Date of meeting or treaty signing', 'repeatable' => true],
            'e' => ['label' => 'Relator term', 'repeatable' => true],
            'f' => ['label' => 'Date of a work', 'repeatable' => false],
            'g' => ['label' => 'Miscellaneous information', 'repeatable' => true],
            'h' => ['label' => 'Medium', 'repeatable' => false],
            'k' => ['label' => 'Form subheading', 'repeatable' => true],
            'l' => ['label' => 'Language of a work', 'repeatable' => false],
            'm' => ['label' => 'Medium of performance for music', 'repeatable' => true],
            'n' => ['label' => 'Number of part/section/meeting', 'repeatable' => true],
            'o' => ['label' => 'Arranged statement for music', 'repeatable' => false],
            'p' => ['label' => 'Name of part/section of a work', 'repeatable' => true],
            'r' => ['label' => 'Key for music', 'repeatable' => false],
            's' => ['label' => 'Version', 'repeatable' => true],
            't' => ['label' => 'Title of a work', 'repeatable' => false],
            'u' => ['label' => 'Affiliation', 'repeatable' => false],
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '611' => [
        'label' => 'Subject added entry--meeting name',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Type of meeting name entry element',
                'values' => [
                    '0' => 'Inverted name',
                    '1' => 'Jurisdiction name',
                    '2' => 'Name in direct order',
                ],
            ],
            2 => [
                'label' => 'Thesaurus',
                'values' => [
                    '0' => 'Library of Congress Subject Headings',
                    '1' => 'Library of Congress Children\'s and Young Adults\' Subject Headings',
                    '2' => 'Medical Subject Headings',
                    '3' => 'National Agricultural Library subject authority file',
                    '4' => 'Source not specified',
                    '5' => 'Canadian Subject Headings',
                    '6' => 'Répertoire de vedettes-matière',
                    '7' => 'Source specified in subfield $2',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of heading or term', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Meeting name or jurisdiction name as entry element', 'repeatable' => false],
            'c' => ['label' => 'Location of meeting', 'repeatable' => true],
            'd' => ['label' => 'Date of meeting or treaty signing', 'repeatable' => true],
            'e' => ['label' => 'Subordinate unit', 'repeatable' => true],
            'f' => ['label' => 'Date of a work', 'repeatable' => false],
            'g' => ['label' => 'Miscellaneous information', 'repeatable' => true],
            'h' => ['label' => 'Medium', 'repeatable' => false],
            'j' => ['label' => 'Relator term', 'repeatable' => true],
            'k' => ['label' => 'Form subheading', 'repeatable' => true],
            'l' => ['label' => 'Language of a work', 'repeatable' => false],
            'n' => ['label' => 'Number of part/section/meeting', 'repeatable' => true],
            'p' => ['label' => 'Name of part/section of a work', 'repeatable' => true],
            'q' => ['label' => 'Name of meeting following jurisdiction name entry element', 'repeatable' => false],
            's' => ['label' => 'Version', 'repeatable' => true],
            't' => ['label' => 'Title of a work', 'repeatable' => false],
            'u' => ['label' => 'Affiliation', 'repeatable' => false],
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '630' => [
        'label' => 'Subject added entry--uniform title',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Nonfiling characters',
                'values' => [
                    '0' => 'Number of nonfiling characters',
                    '1' => 'Number of nonfiling characters',
                    '2' => 'Number of nonfiling characters',
                    '3' => 'Number of nonfiling characters',
                    '4' => 'Number of nonfiling characters',
                    '5' => 'Number of nonfiling characters',
                    '6' => 'Number of nonfiling characters',
                    '7' => 'Number of nonfiling characters',
                    '8' => 'Number of nonfiling characters',
                    '9' => 'Number of nonfiling characters',
                ],
            ],
            2 => [
                'label' => 'Thesaurus',
                'values' => [
                    '0' => 'Library of Congress Subject Headings',
                    '1' => 'Library of Congress Children\'s and Young Adults\' Subject Headings',
                    '2' => 'Medical Subject Headings',
                    '3' => 'National Agricultural Library subject authority file',
                    '4' => 'Source not specified',
                    '5' => 'Canadian Subject Headings',
                    '6' => 'Répertoire de vedettes-matière',
                    '7' => 'Source specified in subfield $2',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of heading or term', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Uniform title', 'repeatable' => false],
            'd' => ['label' => 'Date of treaty signing', 'repeatable' => true],
            'e' => ['label' => 'Relator term', 'repeatable' => true],
            'f' => ['label' => 'Date of a work', 'repeatable' => false],
            'g' => ['label' => 'Miscellaneous information', 'repeatable' => true],
            'h' => ['label' => 'Medium', 'repeatable' => false],
            'k' => ['label' => 'Form subheading', 'repeatable' => true],
            'l' => ['label' => 'Language of a work', 'repeatable' => false],
            'm' => ['label' => 'Medium of performance for music', 'repeatable' => true],
            'n' => ['label' => 'Number of part/section of a work', 'repeatable' => true],
            'o' => ['label' => 'Arranged statement for music', 'repeatable' => false],
            'p' => ['label' => 'Name of part/section of a work', 'repeatable' => true],
            'r' => ['label' => 'Key for music', 'repeatable' => false],
            's' => ['label' => 'Version', 'repeatable' => true],
            't' => ['label' => 'Title of a work', 'repeatable' => false],
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '647' => [
        'label' => 'Subject added entry--named event',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Thesaurus',
                'values' => [
                    '0' => 'Library of Congress Subject Headings',
                    '1' => 'Library of Congress Children\'s and Young Adults\' Subject Headings',
                    '2' => 'Medical Subject Headings',
                    '3' => 'National Agricultural Library subject authority file',
                    '4' => 'Source not specified',
                    '5' => 'Canadian Subject Headings',
                    '6' => 'Répertoire de vedettes-matière',
                    '7' => 'Source specified in subfield $2',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of heading or term', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Named event', 'repeatable' => false],
            'c' => ['label' => 'Location of named event', 'repeatable' => true],
            'd' => ['label' => 'Date of named event', 'repeatable' => false],
            'e' => ['label' => 'Relator term', 'repeatable' => true],
            'g' => ['label' => 'Miscellaneous information', 'repeatable' => true],
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '648' => [
        'label' => 'Subject added entry--chronological term',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Thesaurus',
                'values' => [
                    '0' => 'Library of Congress Subject Headings',
                    '1' => 'Library of Congress Children\'s and Young Adults\' Subject Headings',
                    '2' => 'Medical Subject Headings',
                    '3' => 'National Agricultural Library subject authority file',
                    '4' => 'Source not specified',
                    '5' => 'Canadian Subject Headings',
                    '6' => 'Répertoire de vedettes-matière',
                    '7' => 'Source specified in subfield $2',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of heading or term', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Chronological term', 'repeatable' => false],
            'e' => ['label' => 'Relator term', 'repeatable' => true],
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '650' => [
        'label' => 'Subject added entry--topical term',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Level of subject',
                'values' => [
                    ' ' => 'No information provided',
                    '0' => 'No level specified',
                    '1' => 'Primary',
                    '2' => 'Secondary',
                ],
            ],
            2 => [
                'label' => 'Thesaurus',
                'values' => [
                    '0' => 'Library of Congress Subject Headings',
                    '1' => 'Library of Congress Children\'s and Young Adults\' Subject Headings',
                    '2' => 'Medical Subject Headings',
                    '3' => 'National Agricultural Library subject authority file',
                    '4' => 'Source not specified',
                    '5' => 'Canadian Subject Headings',
                    '6' => 'Répertoire de vedettes-matière',
                    '7' => 'Source specified in subfield $2',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of heading or term', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Topical term or geographic name as entry element', 'repeatable' => false],
            'b' => ['label' => 'Topical term following geographic name as entry element', 'repeatable' => false],
            'c' => ['label' => 'Location of event', 'repeatable' => false],
            'd' => ['label' => 'Active dates', 'repeatable' => false],
            'e' => ['label' => 'Relator term', 'repeatable' => false],
            'g' => ['label' => 'Miscellaneous information', 'repeatable' => true],
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '651' => [
        'label' => 'Subject added entry--geographic name',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Thesaurus',
                'values' => [
                    '0' => 'Library of Congress Subject Headings',
                    '1' => 'Library of Congress Children\'s and Young Adults\' Subject Headings',
                    '2' => 'Medical Subject Headings',
                    '3' => 'National Agricultural Library subject authority file',
                    '4' => 'Source not specified',
                    '5' => 'Canadian Subject Headings',
                    '6' => 'Répertoire de vedettes-matière',
                    '7' => 'Source specified in subfield $2',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of heading or term', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Geographic name', 'repeatable' => false],
            'e' => ['label' => 'Relator term', 'repeatable' => true],
            'g' => ['label' => 'Miscellaneous information', 'repeatable' => true],
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '653' => [
        'label' => 'Index term--uncontrolled',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Level of index term',
                'values' => [
                    ' ' => 'No information provided',
                    '0' => 'No level specified',
                    '1' => 'Primary',
                    '2' => 'Secondary',
                ],
            ],
            2 => [
                'label' => 'Type of term or name',
                'values' => [
                    ' ' => 'No information provided',
                    '0' => 'Topical term',
                    '1' => 'Personal name',
                    '2' => 'Corporate name',
                    '3' => 'Meeting name',
                    '4' => 'Chronological term',
                    '5' => 'Geographic name',
                    '6' => 'Genre/form term',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Uncontrolled term', 'repeatable' => true],
        ],
    ],
    '654' => [
        'label' => 'Subject added entry--faceted topical terms',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Level of subject',
                'values' => [
                    ' ' => 'No information provided',
                    '0' => 'No level specified',
                    '1' => 'Primary',
                    '2' => 'Secondary',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of heading or term', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Focus term', 'repeatable' => true],
            'b' => ['label' => 'Non-focus term', 'repeatable' => true],
            'c' => ['label' => 'Facet/hierarchy designation', 'repeatable' => true],
            'e' => ['label' => 'Relator term', 'repeatable' => true],
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '655' => [
        'label' => 'Index term--genre/form',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Type of heading',
                'values' => [
                    ' ' => 'Basic',
                    '0' => 'Faceted',
                ],
            ],
            2 => [
                'label' => 'Thesaurus',
                'values' => [
                    '0' => 'Library of Congress Subject Headings',
                    '1' => 'Library of Congress Children\'s and Young Adults\' Subject Headings',
                    '2' => 'Medical Subject Headings',
                    '3' => 'National Agricultural Library subject authority file',
                    '4' => 'Source not specified',
                    '5' => 'Canadian Subject Headings',
                    '6' => 'Répertoire de vedettes-matière',
                    '7' => 'Source specified in subfield $2',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of term', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Genre/form data or focus term', 'repeatable' => false],
            'b' => ['label' => 'Non-focus term', 'repeatable' => true],
            'c' => ['label' => 'Facet/hierarchy designation', 'repeatable' => true],
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '656' => [
        'label' => 'Index term--occupation',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Source of term',
                'values' => [
                    '7' => 'Source specified in subfield $2',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of term', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Occupation', 'repeatable' => false],
            'k' => ['label' => 'Form', 'repeatable' => false],
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '657' => [
        'label' => 'Index term--function',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Source of term',
                'values' => [
                    '7' => 'Source specified in subfield $2',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of term', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Function', 'repeatable' => false],
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '658' => [
        'label' => 'Index term--curriculum objective',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of term or code', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Main curriculum objective', 'repeatable' => false],
            'b' => ['label' => 'Subordinate curriculum objective', 'repeatable' => true],
            'c' => ['label' => 'Curriculum code', 'repeatable' => false],
            'd' => ['label' => 'Correlation factor', 'repeatable' => false],
        ],
    ],
    '662' => [
        'label' => 'Subject added entry--hierarchical place name',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of heading or term', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Country or larger entity', 'repeatable' => true],
            'b' => ['label' => 'First-order political jurisdiction', 'repeatable' => false],
            'c' => ['label' => 'Intermediate political jurisdiction', 'repeatable' => true],
            'd' => ['label' => 'City', 'repeatable' => false],
            'e' => ['label' => 'Relator term', 'repeatable' => true],
            'f' => ['label' => 'City subsection', 'repeatable' => true],
            'g' => ['label' => 'Other nonjurisdictional geographic region and feature', 'repeatable' => true],
            'h' => ['label' => 'Extraterrestrial area', 'repeatable' => true],
        ],
    ],
    '688' => [
        'label' => 'Subject added entry--type of entity unspecified',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Source of name, title, or term',
                'values' => [
                    ' ' => 'No information provided',
                    '7' => 'Source specified in subfield $2',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of name, title, or term', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Name, title, or term', 'repeatable' => false],
            'e' => ['label' => 'Relator term', 'repeatable' => true],
            'g' => ['label' => 'Miscellaneous information', 'repeatable' => true],
        ],
    ],
    '700' => [
        'label' => 'Added entry--personal name',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Type of personal name entry element',
                'values' => [
                    '0' => 'Forename',
                    '1' => 'Surname',
                    '3' => 'Family name',
                ],
            ],
            2 => [
                'label' => 'Type of added entry',
                'values' => [
                    ' ' => 'No information provided',
                    '2' => 'Analytical entry',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of heading or term', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Personal name', 'repeatable' => false],
            'b' => ['label' => 'Numeration', 'repeatable' => false],
            'c' => ['label' => 'Titles and other words associated with a name', 'repeatable' => true],
            'd' => ['label' => 'Dates associated with a name', 'repeatable' => false],
            'e' => ['label' => 'Relator term', 'repeatable' => true],
            'f' => ['label' => 'Date of a work', 'repeatable' => false],
            'g' => ['label' => 'Miscellaneous information', 'repeatable' => true],
            'h' => ['label' => 'Medium', 'repeatable' => false],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'j' => ['label' => 'Attribution qualifier', 'repeatable' => true],
            'k' => ['label' => 'Form subheading', 'repeatable' => true],
            'l' => ['label' => 'Language of a work', 'repeatable' => false],
            'm' => ['label' => 'Medium of performance for music', 'repeatable' => true],
            'n' => ['label' => 'Number of part/section of a work', 'repeatable' => true],
            'o' => ['label' => 'Arranged statement for music', 'repeatable' => false],
            'p' => ['label' => 'Name of part/section of a work', 'repeatable' => true],
            'q' => ['label' => 'Fuller form of name', 'repeatable' => false],
            'r' => ['label' => 'Key for music', 'repeatable' => false],
            's' => ['label' => 'Version', 'repeatable' => true],
            't' => ['label' => 'Title of a work', 'repeatable' => false],
            'u' => ['label' => 'Affiliation', 'repeatable' => false],
            'x' => ['label' => 'International Standard Serial Number', 'repeatable' => false],
        ],
    ],
    '710' => [
        'label' => 'Added entry--corporate name',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Type of corporate name entry element',
                'values' => [
                    '0' => 'Inverted name',
                    '1' => 'Jurisdiction name',
                    '2' => 'Name in direct order',
                ],
            ],
            2 => [
                'label' => 'Type of added entry',
                'values' => [
                    ' ' => 'No information provided',
                    '2' => 'Analytical entry',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of heading or term', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Corporate name or jurisdiction name as entry element', 'repeatable' => false],
            'b' => ['label' => 'Subordinate unit', 'repeatable' => true],
            'c' => ['label' => 'Location of meeting', 'repeatable' => true],
            'd' => ['label' => 'Date of meeting or treaty signing', 'repeatable' => true],
            'e' => ['label' => 'Relator term', 'repeatable' => true],
            'f' => ['label' => 'Date of a work', 'repeatable' => false],
            'g' => ['label' => 'Miscellaneous information', 'repeatable' => true],
            'h' => ['label' => 'Medium', 'repeatable' => false],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'k' => ['label' => 'Form subheading', 'repeatable' => true],
            'l' => ['label' => 'Language of a work', 'repeatable' => false],
            'm' => ['label' => 'Medium of performance for music', 'repeatable' => true],
            'n' => ['label' => 'Number of part/section/meeting', 'repeatable' => true],
            'o' => ['label' => 'Arranged statement for music', 'repeatable' => false],
            'p' => ['label' => 'Name of part/section of a work', 'repeatable' => true],
            'r' => ['label' => 'Key for music', 'repeatable' => false],
            's' => ['label' => 'Version', 'repeatable' => true],
            't' => ['label' => 'Title of a work', 'repeatable' => false],
            'u' => ['label' => 'Affiliation', 'repeatable' => false],
            'x' => ['label' => 'International Standard Serial Number', 'repeatable' => false],
        ],
    ],
    '711' => [
        'label' => 'Added entry--meeting name',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Type of meeting name entry element',
                'values' => [
                    '0' => 'Inverted name',
                    '1' => 'Jurisdiction name',
                    '2' => 'Name in direct order',
                ],
            ],
            2 => [
                'label' => 'Type of added entry',
                'values' => [
                    ' ' => 'No information provided',
                    '2' => 'Analytical entry',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of heading or term', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Meeting name or jurisdiction name as entry element', 'repeatable' => false],
            'c' => ['label' => 'Location of meeting', 'repeatable' => true],
            'd' => ['label' => 'Date of meeting or treaty signing', 'repeatable' => true],
            'e' => ['label' => 'Subordinate unit', 'repeatable' => true],
            'f' => ['label' => 'Date of a work', 'repeatable' => false],
            'g' => ['label' => 'Miscellaneous information', 'repeatable' => true],
            'h' => ['label' => 'Medium', 'repeatable' => false],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'j' => ['label' => 'Relator term', 'repeatable' => true],
            'k' => ['label' => 'Form subheading', 'repeatable' => true],
            'l' => ['label' => 'Language of a work', 'repeatable' => false],
            'n' => ['label' => 'Number of part/section/meeting', 'repeatable' => true],
            'p' => ['label' => 'Name of part/section of a work', 'repeatable' => true],
            'q' => ['label' => 'Name of meeting following jurisdiction name entry element', 'repeatable' => false],
            's' => ['label' => 'Version', 'repeatable' => true],
            't' => ['label' => 'Title of a work', 'repeatable' => false],
            'u' => ['label' => 'Affiliation', 'repeatable' => false],
            'x' => ['label' => 'International Standard Serial Number', 'repeatable' => false],
        ],
    ],
    '720' => [
        'label' => 'Added entry--uncontrolled name',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Type of name',
                'values' => [
                    ' ' => 'Not specified',
                    '1' => 'Personal',
                    '2' => 'Other',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Name', 'repeatable' => false],
            'e' => ['label' => 'Relator term', 'repeatable' => true],
        ],
    ],
    '730' => [
        'label' => 'Added entry--uniform title',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Nonfiling characters',
                'values' => [
                    '0' => 'Number of nonfiling characters',
                    '1' => 'Number of nonfiling characters',
                    '2' => 'Number of nonfiling characters',
                    '3' => 'Number of nonfiling characters',
                    '4' => 'Number of nonfiling characters',
                    '5' => 'Number of nonfiling characters',
                    '6' => 'Number of nonfiling characters',
                    '7' => 'Number of nonfiling characters',
                    '8' => 'Number of nonfiling characters',
                    '9' => 'Number of nonfiling characters',
                ],
            ],
            2 => [
                'label' => 'Type of added entry',
                'values' => [
                    ' ' => 'No information provided',
                    '2' => 'Analytical entry',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of heading or term', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Uniform title', 'repeatable' => false],
            'd' => ['label' => 'Date of treaty signing', 'repeatable' => true],
            'f' => ['label' => 'Date of a work', 'repeatable' => false],
            'g' => ['label' => 'Miscellaneous information', 'repeatable' => true],
            'h' => ['label' => 'Medium', 'repeatable' => false],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'k' => ['label' => 'Form subheading', 'repeatable' => true],
            'l' => ['label' => 'Language of a work', 'repeatable' => false],
            'm' => ['label' => 'Medium of performance for music', 'repeatable' => true],
            'n' => ['label' => 'Number of part/section of a work', 'repeatable' => true],
            'o' => ['label' => 'Arranged statement for music', 'repeatable' => false],
            'p' => ['label' => 'Name of part/section of a work', 'repeatable' => true],
            'r' => ['label' => 'Key for music', 'repeatable' => false],
            's' => ['label' => 'Version', 'repeatable' => true],
            't' => ['label' => 'Title of a work', 'repeatable' => false],
            'x' => ['label' => 'International Standard Serial Number', 'repeatable' => false],
        ],
    ],
    '740' => [
        'label' => 'Added entry--uncontrolled related/analytical title',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Nonfiling characters',
                'values' => [
                    '0' => 'Number of nonfiling characters',
                    '1' => 'Number of nonfiling characters',
                    '2' => 'Number of nonfiling characters',
                    '3' => 'Number of nonfiling characters',
                    '4' => 'Number of nonfiling characters',
                    '5' => 'Number of nonfiling characters',
                    '6' => 'Number of nonfiling characters',
                    '7' => 'Number of nonfiling characters',
                    '8' => 'Number of nonfiling characters',
                    '9' => 'Number of nonfiling characters',
                ],
            ],
            2 => [
                'label' => 'Type of added entry',
                'values' => [
                    ' ' => 'No information provided',
                    '2' => 'Analytical entry',
                ],
            ],
        ],
        'subfields' => [
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Uncontrolled related/analytical title', 'repeatable' => false],
            'h' => ['label' => 'Medium', 'repeatable' => false],
            'n' => ['label' => 'Number of part/section of a work', 'repeatable' => true],
            'p' => ['label' => 'Name of part/section of a work', 'repeatable' => true],
        ],
    ],
    '751' => [
        'label' => 'Added entry--geographic name',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of heading or term', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Geographic name', 'repeatable' => false],
            'e' => ['label' => 'Relator term', 'repeatable' => true],
            'g' => ['label' => 'Miscellaneous information', 'repeatable' => true],
        ],
    ],
    '752' => [
        'label' => 'Added entry--hierarchical place name',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of heading or term', 'repeatable' => false],
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Country or larger entity', 'repeatable' => true],
            'b' => ['label' => 'First-order political jurisdiction', 'repeatable' => false],
            'c' => ['label' => 'Intermediate political jurisdiction', 'repeatable' => true],
            'd' => ['label' => 'City', 'repeatable' => false],
            'e' => ['label' => 'Relator term', 'repeatable' => true],
            'f' => ['label' => 'City subsection', 'repeatable' => true],
            'g' => ['label' => 'Other nonjurisdictional geographic region and feature', 'repeatable' => true],
            'h' => ['label' => 'Extraterrestrial area', 'repeatable' => true],
        ],
    ],
    '753' => [
        'label' => 'System details access to computer files',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of term', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Make and model of machine', 'repeatable' => false],
            'b' => ['label' => 'Programming language', 'repeatable' => false],
            'c' => ['label' => 'Operating system', 'repeatable' => false],
        ],
    ],
    '754' => [
        'label' => 'Added entry--taxonomic identification',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of taxonomic identification', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Taxonomic name', 'repeatable' => true],
            'c' => ['label' => 'Taxonomic category', 'repeatable' => true],
            'd' => ['label' => 'Common or alternative name', 'repeatable' => true],
            'x' => ['label' => 'Non-public note', 'repeatable' => true],
            'z' => ['label' => 'Public note', 'repeatable' => true],
        ],
    ],
    '758' => [
        'label' => 'Resource identifier',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of heading or term', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Label', 'repeatable' => false],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
        ],
    ],
    '760' => [
        'label' => 'Main series entry',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Note controller',
                'values' => [
                    '0' => 'Display note',
                    '1' => 'Do not display note',
                ],
            ],
            2 => [
                'label' => 'Display constant controller',
                'values' => [
                    ' ' => 'Main series',
                    '8' => 'No display constant generated',
                ],
            ],
        ],
        'subfields' => [
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Control subfield', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Main entry heading', 'repeatable' => false],
            'b' => ['label' => 'Edition', 'repeatable' => false],
            'c' => ['label' => 'Qualifying information', 'repeatable' => false],
            'd' => ['label' => 'Place, publisher, and date of publication', 'repeatable' => false],
            'g' => ['label' => 'Related parts', 'repeatable' => true],
            'h' => ['label' => 'Physical description', 'repeatable' => false],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'l' => ['label' => 'Data provenance', 'repeatable' => true],
            'm' => ['label' => 'Material-specific details', 'repeatable' => false],
            'n' => ['label' => 'Note', 'repeatable' => true],
            'o' => ['label' => 'Other item identifier', 'repeatable' => true],
            's' => ['label' => 'Uniform title', 'repeatable' => false],
            't' => ['label' => 'Title', 'repeatable' => false],
            'w' => ['label' => 'Record control number', 'repeatable' => true],
            'x' => ['label' => 'International Standard Serial Number', 'repeatable' => false],
            'y' => ['label' => 'CODEN designation', 'repeatable' => false],
        ],
    ],
    '762' => [
        'label' => 'Subseries entry',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Note controller',
                'values' => [
                    '0' => 'Display note',
                    '1' => 'Do not display note',
                ],
            ],
            2 => [
                'label' => 'Display constant controller',
                'values' => [
                    ' ' => 'Has subseries',
                    '8' => 'No display constant generated',
                ],
            ],
        ],
        'subfields' => [
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Control subfield', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Main entry heading', 'repeatable' => false],
            'b' => ['label' => 'Edition', 'repeatable' => false],
            'c' => ['label' => 'Qualifying information', 'repeatable' => false],
            'd' => ['label' => 'Place, publisher, and date of publication', 'repeatable' => false],
            'g' => ['label' => 'Related parts', 'repeatable' => true],
            'h' => ['label' => 'Physical description', 'repeatable' => false],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'l' => ['label' => 'Data provenance', 'repeatable' => true],
            'm' => ['label' => 'Material-specific details', 'repeatable' => false],
            'n' => ['label' => 'Note', 'repeatable' => true],
            'o' => ['label' => 'Other item identifier', 'repeatable' => true],
            's' => ['label' => 'Uniform title', 'repeatable' => false],
            't' => ['label' => 'Title', 'repeatable' => false],
            'w' => ['label' => 'Record control number', 'repeatable' => true],
            'x' => ['label' => 'International Standard Serial Number', 'repeatable' => false],
            'y' => ['label' => 'CODEN designation', 'repeatable' => false],
        ],
    ],
    '765' => [
        'label' => 'Original language entry',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Note controller',
                'values' => [
                    '0' => 'Display note',
                    '1' => 'Do not display note',
                ],
            ],
            2 => [
                'label' => 'Display constant controller',
                'values' => [
                    ' ' => 'Translation of',
                    '8' => 'No display constant generated',
                ],
            ],
        ],
        'subfields' => [
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Control subfield', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Main entry heading', 'repeatable' => false],
            'b' => ['label' => 'Edition', 'repeatable' => false],
            'c' => ['label' => 'Qualifying information', 'repeatable' => false],
            'd' => ['label' => 'Place, publisher, and date of publication', 'repeatable' => false],
            'g' => ['label' => 'Related parts', 'repeatable' => true],
            'h' => ['label' => 'Physical description', 'repeatable' => false],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'k' => ['label' => 'Series data for related item', 'repeatable' => true],
            'l' => ['label' => 'Data provenance', 'repeatable' => true],
            'm' => ['label' => 'Material-specific details', 'repeatable' => false],
            'n' => ['label' => 'Note', 'repeatable' => true],
            'o' => ['label' => 'Other item identifier', 'repeatable' => true],
            'r' => ['label' => 'Report number', 'repeatable' => true],
            's' => ['label' => 'Uniform title', 'repeatable' => false],
            't' => ['label' => 'Title', 'repeatable' => false],
            'u' => ['label' => 'Standard Technical Report Number', 'repeatable' => false],
            'w' => ['label' => 'Record control number', 'repeatable' => true],
            'x' => ['label' => 'International Standard Serial Number', 'repeatable' => false],
            'y' => ['label' => 'CODEN designation', 'repeatable' => false],
            'z' => ['label' => 'International Standard Book Number', 'repeatable' => true],
        ],
    ],
    '767' => [
        'label' => 'Translation entry',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Note controller',
                'values' => [
                    '0' => 'Display note',
                    '1' => 'Do not display note',
                ],
            ],
            2 => [
                'label' => 'Display constant controller',
                'values' => [
                    ' ' => 'Translated as',
                    '8' => 'No display constant generated',
                ],
            ],
        ],
        'subfields' => [
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Control subfield', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Main entry heading', 'repeatable' => false],
            'b' => ['label' => 'Edition', 'repeatable' => false],
            'c' => ['label' => 'Qualifying information', 'repeatable' => false],
            'd' => ['label' => 'Place, publisher, and date of publication', 'repeatable' => false],
            'g' => ['label' => 'Related parts', 'repeatable' => true],
            'h' => ['label' => 'Physical description', 'repeatable' => false],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'k' => ['label' => 'Series data for related item', 'repeatable' => true],
            'l' => ['label' => 'Data provenance', 'repeatable' => true],
            'm' => ['label' => 'Material-specific details', 'repeatable' => false],
            'n' => ['label' => 'Note', 'repeatable' => true],
            'o' => ['label' => 'Other item identifier', 'repeatable' => true],
            'r' => ['label' => 'Report number', 'repeatable' => true],
            's' => ['label' => 'Uniform title', 'repeatable' => false],
            't' => ['label' => 'Title', 'repeatable' => false],
            'u' => ['label' => 'Standard Technical Report Number', 'repeatable' => false],
            'w' => ['label' => 'Record control number', 'repeatable' => true],
            'x' => ['label' => 'International Standard Serial Number', 'repeatable' => false],
            'y' => ['label' => 'CODEN designation', 'repeatable' => false],
            'z' => ['label' => 'International Standard Book Number', 'repeatable' => true],
        ],
    ],
    '770' => [
        'label' => 'Supplement/special issue entry',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Note controller',
                'values' => [
                    '0' => 'Display note',
                    '1' => 'Do not display note',
                ],
            ],
            2 => [
                'label' => 'Display constant controller',
                'values' => [
                    ' ' => 'Has supplement',
                    '8' => 'No display constant generated',
                ],
            ],
        ],
        'subfields' => [
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Control subfield', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Main entry heading', 'repeatable' => false],
            'b' => ['label' => 'Edition', 'repeatable' => false],
            'c' => ['label' => 'Qualifying information', 'repeatable' => false],
            'd' => ['label' => 'Place, publisher, and date of publication', 'repeatable' => false],
            'g' => ['label' => 'Related parts', 'repeatable' => true],
            'h' => ['label' => 'Physical description', 'repeatable' => false],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'k' => ['label' => 'Series data for related item', 'repeatable' => true],
            'l' => ['label' => 'Data provenance', 'repeatable' => true],
            'm' => ['label' => 'Material-specific details', 'repeatable' => false],
            'n' => ['label' => 'Note', 'repeatable' => true],
            'o' => ['label' => 'Other item identifier', 'repeatable' => true],
            'r' => ['label' => 'Report number', 'repeatable' => true],
            's' => ['label' => 'Uniform title', 'repeatable' => false],
            't' => ['label' => 'Title', 'repeatable' => false],
            'u' => ['label' => 'Standard Technical Report Number', 'repeatable' => false],
            'w' => ['label' => 'Record control number', 'repeatable' => true],
            'x' => ['label' => 'International Standard Serial Number', 'repeatable' => false],
            'y' => ['label' => 'CODEN designation', 'repeatable' => false],
            'z' => ['label' => 'International Standard Book Number', 'repeatable' => true],
        ],
    ],
    '772' => [
        'label' => 'Supplement parent entry',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Note controller',
                'values' => [
                    '0' => 'Display note',
                    '1' => 'Do not display note',
                ],
            ],
            2 => [
                'label' => 'Display constant controller',
                'values' => [
                    ' ' => 'Supplement to',
                    '0' => 'Parent',
                    '8' => 'No display constant generated',
                ],
            ],
        ],
        'subfields' => [
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Control subfield', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Main entry heading', 'repeatable' => false],
            'b' => ['label' => 'Edition', 'repeatable' => false],
            'c' => ['label' => 'Qualifying information', 'repeatable' => false],
            'd' => ['label' => 'Place, publisher, and date of publication', 'repeatable' => false],
            'g' => ['label' => 'Related parts', 'repeatable' => true],
            'h' => ['label' => 'Physical description', 'repeatable' => false],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'k' => ['label' => 'Series data for related item', 'repeatable' => true],
            'l' => ['label' => 'Data provenance', 'repeatable' => true],
            'm' => ['label' => 'Material-specific details', 'repeatable' => false],
            'n' => ['label' => 'Note', 'repeatable' => true],
            'o' => ['label' => 'Other item identifier', 'repeatable' => true],
            'r' => ['label' => 'Report number', 'repeatable' => true],
            's' => ['label' => 'Uniform title', 'repeatable' => false],
            't' => ['label' => 'Title', 'repeatable' => false],
            'u' => ['label' => 'Standard Technical Report Number', 'repeatable' => false],
            'w' => ['label' => 'Record control number', 'repeatable' => true],
            'x' => ['label' => 'International Standard Serial Number', 'repeatable' => false],
            'y' => ['label' => 'CODEN designation', 'repeatable' => false],
            'z' => ['label' => 'International Stan dard Book Number', 'repeatable' => true],
        ],
    ],
    '773' => [
        'label' => 'Host item entry',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Note controller',
                'values' => [
                    '0' => 'Display note',
                    '1' => 'Do not display note',
                ],
            ],
            2 => [
                'label' => 'Display constant controller',
                'values' => [
                    ' ' => 'In',
                    '8' => 'No display constant generated',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Host Biblionumber', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Control subfield', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Main entry heading', 'repeatable' => false],
            'b' => ['label' => 'Edition', 'repeatable' => false],
            'd' => ['label' => 'Place, publisher, and date of publication', 'repeatable' => false],
            'g' => ['label' => 'Related parts', 'repeatable' => true],
            'h' => ['label' => 'Physical description', 'repeatable' => false],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'k' => ['label' => 'Series data for related item', 'repeatable' => true],
            'l' => ['label' => 'Data provenance', 'repeatable' => true],
            'm' => ['label' => 'Material-specific details', 'repeatable' => false],
            'n' => ['label' => 'Note', 'repeatable' => true],
            'o' => ['label' => 'Other item identifier', 'repeatable' => true],
            'p' => ['label' => 'Abbreviated title', 'repeatable' => false],
            'q' => ['label' => 'Enumeration and first page', 'repeatable' => false],
            'r' => ['label' => 'Report number', 'repeatable' => true],
            's' => ['label' => 'Uniform title', 'repeatable' => false],
            't' => ['label' => 'Title', 'repeatable' => false],
            'u' => ['label' => 'Standard Technical Report Number', 'repeatable' => false],
            'w' => ['label' => 'Record control number', 'repeatable' => true],
            'x' => ['label' => 'International Standard Serial Number', 'repeatable' => false],
            'y' => ['label' => 'CODEN designation', 'repeatable' => false],
            'z' => ['label' => 'International Standard Book Number', 'repeatable' => true],
        ],
    ],
    '774' => [
        'label' => 'Constituent unit entry',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Note controller',
                'values' => [
                    '0' => 'Display note',
                    '1' => 'Do not display note',
                ],
            ],
            2 => [
                'label' => 'Display constant controller',
                'values' => [
                    ' ' => 'Constituent unit',
                    '8' => 'No display constant generated',
                ],
            ],
        ],
        'subfields' => [
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Control subfield', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Main entry heading', 'repeatable' => false],
            'b' => ['label' => 'Edition', 'repeatable' => false],
            'c' => ['label' => 'Qualifying information', 'repeatable' => false],
            'd' => ['label' => 'Place, publisher, and date of publication', 'repeatable' => false],
            'g' => ['label' => 'Related parts', 'repeatable' => true],
            'h' => ['label' => 'Physical description', 'repeatable' => false],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'k' => ['label' => 'Series data for related item', 'repeatable' => true],
            'l' => ['label' => 'Data provenance', 'repeatable' => true],
            'm' => ['label' => 'Material-specific details', 'repeatable' => false],
            'n' => ['label' => 'Note', 'repeatable' => true],
            'o' => ['label' => 'Other item identifier', 'repeatable' => true],
            'r' => ['label' => 'Report number', 'repeatable' => true],
            's' => ['label' => 'Uniform title', 'repeatable' => false],
            't' => ['label' => 'Title', 'repeatable' => false],
            'u' => ['label' => 'Standard Technical Report Number', 'repeatable' => false],
            'w' => ['label' => 'Record control number', 'repeatable' => true],
            'x' => ['label' => 'International Standard Serial Number', 'repeatable' => false],
            'y' => ['label' => 'CODEN designation', 'repeatable' => false],
            'z' => ['label' => 'International Standard Book Number', 'repeatable' => true],
        ],
    ],
    '775' => [
        'label' => 'Other edition entry',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Note controller',
                'values' => [
                    '0' => 'Display note',
                    '1' => 'Do not display note',
                ],
            ],
            2 => [
                'label' => 'Display constant controller',
                'values' => [
                    ' ' => 'Other edition available',
                    '8' => 'No display constant generated',
                ],
            ],
        ],
        'subfields' => [
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Control subfield', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Main entry heading', 'repeatable' => false],
            'b' => ['label' => 'Edition', 'repeatable' => false],
            'c' => ['label' => 'Qualifying information', 'repeatable' => false],
            'd' => ['label' => 'Place, publisher, and date of publication', 'repeatable' => false],
            'e' => ['label' => 'Language code', 'repeatable' => false],
            'f' => ['label' => 'Country code', 'repeatable' => false],
            'g' => ['label' => 'Related parts', 'repeatable' => true],
            'h' => ['label' => 'Physical description', 'repeatable' => false],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'k' => ['label' => 'Series data for related item', 'repeatable' => true],
            'l' => ['label' => 'Data provenance', 'repeatable' => true],
            'm' => ['label' => 'Material-specific details', 'repeatable' => false],
            'n' => ['label' => 'Note', 'repeatable' => true],
            'o' => ['label' => 'Other item identifier', 'repeatable' => true],
            'r' => ['label' => 'Report number', 'repeatable' => true],
            's' => ['label' => 'Uniform title', 'repeatable' => false],
            't' => ['label' => 'Title', 'repeatable' => false],
            'u' => ['label' => 'Standard Technical Report Number', 'repeatable' => false],
            'w' => ['label' => 'Record control number', 'repeatable' => true],
            'x' => ['label' => 'International Standard Serial Number', 'repeatable' => false],
            'y' => ['label' => 'CODEN designation', 'repeatable' => false],
            'z' => ['label' => 'International Standard Book Number', 'repeatable' => true],
        ],
    ],
    '776' => [
        'label' => 'Additional physical form entry',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Note controller',
                'values' => [
                    '0' => 'Display note',
                    '1' => 'Do not display note',
                ],
            ],
            2 => [
                'label' => 'Display constant controller',
                'values' => [
                    ' ' => 'Available in another form',
                    '8' => 'No display constant generated',
                ],
            ],
        ],
        'subfields' => [
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Control subfield', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Main entry heading', 'repeatable' => false],
            'b' => ['label' => 'Edition', 'repeatable' => false],
            'c' => ['label' => 'Qualifying information', 'repeatable' => false],
            'd' => ['label' => 'Place, publisher, and date of publication', 'repeatable' => false],
            'g' => ['label' => 'Related parts', 'repeatable' => true],
            'h' => ['label' => 'Physical description', 'repeatable' => false],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'k' => ['label' => 'Series data for related item', 'repeatable' => true],
            'l' => ['label' => 'Data provenance', 'repeatable' => true],
            'm' => ['label' => 'Material-specific details', 'repeatable' => false],
            'n' => ['label' => 'Note', 'repeatable' => true],
            'o' => ['label' => 'Other item identifier', 'repeatable' => true],
            'r' => ['label' => 'Report number', 'repeatable' => true],
            's' => ['label' => 'Uniform title', 'repeatable' => false],
            't' => ['label' => 'Title', 'repeatable' => false],
            'u' => ['label' => 'Standard Technical Report Number', 'repeatable' => false],
            'w' => ['label' => 'Record control number', 'repeatable' => true],
            'x' => ['label' => 'International Standard Serial Number', 'repeatable' => false],
            'y' => ['label' => 'CODEN designation', 'repeatable' => false],
            'z' => ['label' => 'International Standard Book Number', 'repeatable' => true],
        ],
    ],
    '777' => [
        'label' => 'Issued with entry',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Note controller',
                'values' => [
                    '0' => 'Display note',
                    '1' => 'Do not display note',
                ],
            ],
            2 => [
                'label' => 'Display constant controller',
                'values' => [
                    ' ' => 'Issued with',
                    '8' => 'No display constant generated',
                ],
            ],
        ],
        'subfields' => [
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Control subfield', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Main entry heading', 'repeatable' => false],
            'b' => ['label' => 'Edition', 'repeatable' => false],
            'c' => ['label' => 'Qualifying information', 'repeatable' => false],
            'd' => ['label' => 'Place, publisher, and date of publication', 'repeatable' => false],
            'g' => ['label' => 'Related parts', 'repeatable' => true],
            'h' => ['label' => 'Physical description', 'repeatable' => false],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'k' => ['label' => 'Series data for related item', 'repeatable' => true],
            'l' => ['label' => 'Data provenance', 'repeatable' => true],
            'm' => ['label' => 'Material-specific details', 'repeatable' => false],
            'n' => ['label' => 'Note', 'repeatable' => true],
            'o' => ['label' => 'Other item identifier', 'repeatable' => true],
            'r' => ['label' => 'Report number', 'repeatable' => true],
            's' => ['label' => 'Uniform title', 'repeatable' => false],
            't' => ['label' => 'Title', 'repeatable' => false],
            'u' => ['label' => 'Standard Technical Report Number', 'repeatable' => false],
            'w' => ['label' => 'Record control number', 'repeatable' => true],
            'x' => ['label' => 'International Standard Serial Number', 'repeatable' => false],
            'y' => ['label' => 'CODEN designation', 'repeatable' => false],
            'z' => ['label' => 'International Standard Book Number', 'repeatable' => true],
        ],
    ],
    '780' => [
        'label' => 'Preceding entry',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Note controller',
                'values' => [
                    '0' => 'Display note',
                    '1' => 'Do not display note',
                ],
            ],
            2 => [
                'label' => 'Type of relationship',
                'values' => [
                    '0' => 'Continues',
                    '1' => 'Continues in part',
                    '2' => 'Supersedes',
                    '3' => 'Supersedes in part',
                    '4' => 'Formed by the union of ... and ...',
                    '5' => 'Absorbed',
                    '6' => 'Absorbed in part',
                    '7' => 'Separated from',
                ],
            ],
        ],
        'subfields' => [
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Control subfield', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Main entry heading', 'repeatable' => false],
            'b' => ['label' => 'Edition', 'repeatable' => false],
            'c' => ['label' => 'Qualifying information', 'repeatable' => false],
            'd' => ['label' => 'Place, publisher, and date of publication', 'repeatable' => false],
            'g' => ['label' => 'Related parts', 'repeatable' => true],
            'h' => ['label' => 'Physical description', 'repeatable' => false],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'k' => ['label' => 'Series data for related item', 'repeatable' => true],
            'l' => ['label' => 'Data provenance', 'repeatable' => true],
            'm' => ['label' => 'Material-specific details', 'repeatable' => false],
            'n' => ['label' => 'Note', 'repeatable' => true],
            'o' => ['label' => 'Other item identifier', 'repeatable' => true],
            'r' => ['label' => 'Report number', 'repeatable' => true],
            's' => ['label' => 'Uniform title', 'repeatable' => false],
            't' => ['label' => 'Title', 'repeatable' => false],
            'u' => ['label' => 'Standard Technical Report Number', 'repeatable' => false],
            'w' => ['label' => 'Record control number', 'repeatable' => true],
            'x' => ['label' => 'International Standard Serial Number', 'repeatable' => false],
            'y' => ['label' => 'CODEN designation', 'repeatable' => false],
            'z' => ['label' => 'International Standard Book Number', 'repeatable' => true],
        ],
    ],
    '785' => [
        'label' => 'Succeeding entry',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Note controller',
                'values' => [
                    '0' => 'Display note',
                    '1' => 'Do not display note',
                ],
            ],
            2 => [
                'label' => 'Type of relationship',
                'values' => [
                    '0' => 'Continued by',
                    '1' => 'Continued in part by',
                    '2' => 'Superseded by',
                    '3' => 'Superseded in part by',
                    '4' => 'Absorbed by',
                    '5' => 'Absorbed in part by',
                    '6' => 'Split into ... and ...',
                    '7' => 'Merged with ... to form ...',
                    '8' => 'Changed back to',
                ],
            ],
        ],
        'subfields' => [
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Control subfield', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Main entry heading', 'repeatable' => false],
            'b' => ['label' => 'Edition', 'repeatable' => false],
            'c' => ['label' => 'Qualifying information', 'repeatable' => false],
            'd' => ['label' => 'Place, publisher, and date of publication', 'repeatable' => false],
            'g' => ['label' => 'Related parts', 'repeatable' => true],
            'h' => ['label' => 'Physical description', 'repeatable' => false],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'k' => ['label' => 'Series data for related item', 'repeatable' => true],
            'l' => ['label' => 'Data provenance', 'repeatable' => true],
            'm' => ['label' => 'Material-specific details', 'repeatable' => false],
            'n' => ['label' => 'Note', 'repeatable' => true],
            'o' => ['label' => 'Other item identifier', 'repeatable' => true],
            'r' => ['label' => 'Report number', 'repeatable' => true],
            's' => ['label' => 'Uniform title', 'repeatable' => false],
            't' => ['label' => 'Title', 'repeatable' => false],
            'u' => ['label' => 'Standard Technical Report Number', 'repeatable' => false],
            'w' => ['label' => 'Record control number', 'repeatable' => true],
            'x' => ['label' => 'International Standard Serial Number', 'repeatable' => false],
            'y' => ['label' => 'CODEN designation', 'repeatable' => false],
            'z' => ['label' => 'International Standard Book Number', 'repeatable' => true],
        ],
    ],
    '786' => [
        'label' => 'Data source entry',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Note controller',
                'values' => [
                    '0' => 'Display note',
                    '1' => 'Do not display note',
                ],
            ],
            2 => [
                'label' => 'Display constant controller',
                'values' => [
                    ' ' => 'Data source',
                    '8' => 'No display constant generated',
                ],
            ],
        ],
        'subfields' => [
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Control subfield', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Main entry heading', 'repeatable' => false],
            'b' => ['label' => 'Edition', 'repeatable' => false],
            'c' => ['label' => 'Qualifying information', 'repeatable' => false],
            'd' => ['label' => 'Place, publisher, and date of publication', 'repeatable' => false],
            'g' => ['label' => 'Related parts', 'repeatable' => true],
            'h' => ['label' => 'Physical description', 'repeatable' => false],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'j' => ['label' => 'Period of content', 'repeatable' => false],
            'k' => ['label' => 'Series data for related item', 'repeatable' => true],
            'l' => ['label' => 'Data provenance', 'repeatable' => true],
            'm' => ['label' => 'Material-specific details', 'repeatable' => false],
            'n' => ['label' => 'Note', 'repeatable' => true],
            'o' => ['label' => 'Other item identifier', 'repeatable' => true],
            'p' => ['label' => 'Abbreviated title', 'repeatable' => false],
            'r' => ['label' => 'Report number', 'repeatable' => true],
            's' => ['label' => 'Uniform title', 'repeatable' => false],
            't' => ['label' => 'Title', 'repeatable' => false],
            'u' => ['label' => 'Standard Technical Report Number', 'repeatable' => false],
            'v' => ['label' => 'Source Contribution', 'repeatable' => false],
            'w' => ['label' => 'Record control number', 'repeatable' => true],
            'x' => ['label' => 'International Standard Serial Number', 'repeatable' => false],
            'y' => ['label' => 'CODEN designation', 'repeatable' => false],
            'z' => ['label' => 'International Standard Book Number', 'repeatable' => true],
        ],
    ],
    '787' => [
        'label' => 'Other relationship entry',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Note controller',
                'values' => [
                    '0' => 'Display note',
                    '1' => 'Do not display note',
                ],
            ],
            2 => [
                'label' => 'Display constant controller',
                'values' => [
                    ' ' => 'Related item',
                    '8' => 'No display constant generated',
                ],
            ],
        ],
        'subfields' => [
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Control subfield', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Main entry heading', 'repeatable' => false],
            'b' => ['label' => 'Edition', 'repeatable' => false],
            'c' => ['label' => 'Qualifying information', 'repeatable' => false],
            'd' => ['label' => 'Place, publisher, and date of publication', 'repeatable' => false],
            'g' => ['label' => 'Related parts', 'repeatable' => true],
            'h' => ['label' => 'Physical description', 'repeatable' => false],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'k' => ['label' => 'Series data for related item', 'repeatable' => true],
            'l' => ['label' => 'Data provenance', 'repeatable' => true],
            'm' => ['label' => 'Material-specific details', 'repeatable' => false],
            'n' => ['label' => 'Note', 'repeatable' => true],
            'o' => ['label' => 'Other item identifier', 'repeatable' => true],
            'r' => ['label' => 'Report number', 'repeatable' => true],
            's' => ['label' => 'Uniform title', 'repeatable' => false],
            't' => ['label' => 'Title', 'repeatable' => false],
            'u' => ['label' => 'Standard Technical Report Number', 'repeatable' => false],
            'w' => ['label' => 'Record control number', 'repeatable' => true],
            'x' => ['label' => 'International Standard Serial Number', 'repeatable' => false],
            'y' => ['label' => 'CODEN designation', 'repeatable' => false],
            'z' => ['label' => 'International Standard Book Number', 'repeatable' => true],
        ],
    ],
    '788' => [
        'label' => 'Parallel description in another language of cataloging',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Note controller',
                'values' => [
                    '0' => 'Display note',
                    '1' => 'Do not display note',
                ],
            ],
            2 => [
                'label' => 'Display constant controller',
                'values' => [
                    ' ' => 'Parallel description in another language of cataloging',
                    '8' => 'No display constant generated',
                ],
            ],
        ],
        'subfields' => [
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Main entry heading', 'repeatable' => false],
            'b' => ['label' => 'Edition', 'repeatable' => false],
            'd' => ['label' => 'Place, publisher, and date of publication', 'repeatable' => false],
            'e' => ['label' => 'Language of cataloging', 'repeatable' => false],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'l' => ['label' => 'Data provenance', 'repeatable' => true],
            'n' => ['label' => 'Note', 'repeatable' => true],
            's' => ['label' => 'Uniform title', 'repeatable' => false],
            't' => ['label' => 'Title', 'repeatable' => false],
            'w' => ['label' => 'Record control number', 'repeatable' => true],
            'x' => ['label' => 'International Standard Serial Number', 'repeatable' => false],
        ],
    ],
    '800' => [
        'label' => 'Series added entry--personal name',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Type of personal name entry element',
                'values' => [
                    '0' => 'Forename',
                    '1' => 'Surname',
                    '3' => 'Family name',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of heading or term', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Control subfield', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Personal name', 'repeatable' => false],
            'b' => ['label' => 'Numeration', 'repeatable' => false],
            'c' => ['label' => 'Titles and other words associated with a name', 'repeatable' => true],
            'd' => ['label' => 'Dates associated with a name', 'repeatable' => false],
            'e' => ['label' => 'Relator term', 'repeatable' => true],
            'f' => ['label' => 'Date of a work', 'repeatable' => false],
            'g' => ['label' => 'Miscellaneous information', 'repeatable' => true],
            'h' => ['label' => 'Medium', 'repeatable' => false],
            'j' => ['label' => 'Attribution qualifier', 'repeatable' => true],
            'k' => ['label' => 'Form subheading', 'repeatable' => true],
            'l' => ['label' => 'Language of a work', 'repeatable' => false],
            'm' => ['label' => 'Medium of performance for music', 'repeatable' => true],
            'n' => ['label' => 'Number of part/section of a work', 'repeatable' => true],
            'o' => ['label' => 'Arranged statement for music', 'repeatable' => false],
            'p' => ['label' => 'Name of part/section of a work', 'repeatable' => true],
            'q' => ['label' => 'Fuller form of name', 'repeatable' => false],
            'r' => ['label' => 'Key for music', 'repeatable' => false],
            's' => ['label' => 'Version', 'repeatable' => true],
            't' => ['label' => 'Title of a work', 'repeatable' => false],
            'u' => ['label' => 'Affiliation', 'repeatable' => false],
            'v' => ['label' => 'Volume/sequential designation', 'repeatable' => false],
            'w' => ['label' => 'Bibliographic record control number', 'repeatable' => true],
            'x' => ['label' => 'International Standard Serial Number', 'repeatable' => false],
            'y' => ['label' => 'Data provenance', 'repeatable' => true],
        ],
    ],
    '810' => [
        'label' => 'Series added entry--corporate name',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Type of corporate name entry element',
                'values' => [
                    '0' => 'Inverted name',
                    '1' => 'Jurisdiction name',
                    '2' => 'Name in direct order',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of heading or term', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Control subfield', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Corporate name or jurisdiction name as entry element', 'repeatable' => false],
            'b' => ['label' => 'Subordinate unit', 'repeatable' => true],
            'c' => ['label' => 'Location of meeting', 'repeatable' => true],
            'd' => ['label' => 'Date of meeting or treaty signing', 'repeatable' => true],
            'e' => ['label' => 'Relator term', 'repeatable' => true],
            'f' => ['label' => 'Date of a work', 'repeatable' => false],
            'g' => ['label' => 'Miscellaneous information', 'repeatable' => true],
            'h' => ['label' => 'Medium', 'repeatable' => false],
            'k' => ['label' => 'Form subheading', 'repeatable' => true],
            'l' => ['label' => 'Language of a work', 'repeatable' => false],
            'm' => ['label' => 'Medium of performance for music', 'repeatable' => true],
            'n' => ['label' => 'Number of part/section/meeting', 'repeatable' => true],
            'o' => ['label' => 'Arranged statement for music', 'repeatable' => false],
            'p' => ['label' => 'Name of part/section of a work', 'repeatable' => true],
            'r' => ['label' => 'Key for music', 'repeatable' => false],
            's' => ['label' => 'Version', 'repeatable' => true],
            't' => ['label' => 'Title of a work', 'repeatable' => false],
            'u' => ['label' => 'Affiliation', 'repeatable' => false],
            'v' => ['label' => 'Volume/sequential designation', 'repeatable' => false],
            'w' => ['label' => 'Bibliographic record control number', 'repeatable' => true],
            'x' => ['label' => 'International Standard Serial Number', 'repeatable' => false],
            'y' => ['label' => 'Data provenance', 'repeatable' => true],
        ],
    ],
    '811' => [
        'label' => 'Series added entry--meeting name',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Type of meeting name entry element',
                'values' => [
                    '0' => 'Inverted name',
                    '1' => 'Jurisdiction name',
                    '2' => 'Name in direct order',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of heading or term', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Control subfield', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Meeting name or jurisdiction name as entry element', 'repeatable' => false],
            'c' => ['label' => 'Location of meeting', 'repeatable' => true],
            'd' => ['label' => 'Date of meeting or treaty signing', 'repeatable' => true],
            'e' => ['label' => 'Subordinate unit', 'repeatable' => true],
            'f' => ['label' => 'Date of a work', 'repeatable' => false],
            'g' => ['label' => 'Miscellaneous information', 'repeatable' => true],
            'h' => ['label' => 'Medium', 'repeatable' => false],
            'j' => ['label' => 'Relator term', 'repeatable' => true],
            'k' => ['label' => 'Form subheading', 'repeatable' => true],
            'l' => ['label' => 'Language of a work', 'repeatable' => false],
            'n' => ['label' => 'Number of part/section/meeting', 'repeatable' => true],
            'p' => ['label' => 'Name of part/section of a work', 'repeatable' => true],
            'q' => ['label' => 'Name of meeting following jurisdiction name entry element', 'repeatable' => false],
            's' => ['label' => 'Version', 'repeatable' => true],
            't' => ['label' => 'Title of a work', 'repeatable' => false],
            'u' => ['label' => 'Affiliation', 'repeatable' => false],
            'v' => ['label' => 'Volume/sequential designation', 'repeatable' => false],
            'w' => ['label' => 'Bibliographic record control number', 'repeatable' => true],
            'x' => ['label' => 'International Standard Serial Number', 'repeatable' => false],
            'y' => ['label' => 'Data provenance', 'repeatable' => true],
        ],
    ],
    '830' => [
        'label' => 'Series added entry--uniform title',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Nonfiling characters',
                'values' => [
                    '0' => 'Number of nonfiling characters',
                    '1' => 'Number of nonfiling characters',
                    '2' => 'Number of nonfiling characters',
                    '3' => 'Number of nonfiling characters',
                    '4' => 'Number of nonfiling characters',
                    '5' => 'Number of nonfiling characters',
                    '6' => 'Number of nonfiling characters',
                    '7' => 'Number of nonfiling characters',
                    '8' => 'Number of nonfiling characters',
                    '9' => 'Number of nonfiling characters',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of heading or term', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Control subfield', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Uniform title', 'repeatable' => false],
            'd' => ['label' => 'Date of treaty signing', 'repeatable' => true],
            'f' => ['label' => 'Date of a work', 'repeatable' => false],
            'g' => ['label' => 'Miscellaneous information', 'repeatable' => true],
            'h' => ['label' => 'Medium', 'repeatable' => false],
            'k' => ['label' => 'Form subheading', 'repeatable' => true],
            'l' => ['label' => 'Language of a work', 'repeatable' => false],
            'm' => ['label' => 'Medium of performance for music', 'repeatable' => true],
            'n' => ['label' => 'Number of part/section of a work', 'repeatable' => true],
            'o' => ['label' => 'Arranged statement for music', 'repeatable' => false],
            'p' => ['label' => 'Name of part/section of a work', 'repeatable' => true],
            'r' => ['label' => 'Key for music', 'repeatable' => false],
            's' => ['label' => 'Version', 'repeatable' => true],
            't' => ['label' => 'Title of a work', 'repeatable' => false],
            'v' => ['label' => 'Volume/sequential designation', 'repeatable' => false],
            'w' => ['label' => 'Bibliographic record control number', 'repeatable' => true],
            'x' => ['label' => 'International Standard Serial Number', 'repeatable' => false],
            'y' => ['label' => 'Data provenance', 'repeatable' => true],
        ],
    ],
    '841' => [
        'label' => 'Holdings coded data values',
        'repeatable' => false,
        'indicators' => [],
        'subfields' => [
            'a' => ['label' => 'Type of record', 'repeatable' => false],
            'b' => ['label' => 'Fixed-length data elements', 'repeatable' => false],
            'e' => ['label' => 'Encoding level', 'repeatable' => false],
        ],
    ],
    '842' => [
        'label' => 'Textual physical form designator',
        'repeatable' => false,
        'indicators' => [],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Textual physical form designator', 'repeatable' => false],
        ],
    ],
    '843' => [
        'label' => 'Reproduction note',
        'repeatable' => true,
        'indicators' => [],
        'subfields' => [
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Fixed-length data elements of reproduction', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Type of reproduction', 'repeatable' => false],
            'b' => ['label' => 'Place of reproduction', 'repeatable' => true],
            'c' => ['label' => 'Agency responsible for reproduction', 'repeatable' => true],
            'd' => ['label' => 'Date of reproduction', 'repeatable' => false],
            'e' => ['label' => 'Physical description of reproduction', 'repeatable' => true],
            'f' => ['label' => 'Series statement of reproduction', 'repeatable' => true],
            'm' => ['label' => 'Dates of publication and/or sequential designation of issues reproduced', 'repeatable' => true],
            'n' => ['label' => 'Note about reproduction', 'repeatable' => true],
        ],
    ],
    '844' => [
        'label' => 'Name of unit',
        'repeatable' => false,
        'indicators' => [],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Name of unit', 'repeatable' => false],
        ],
    ],
    '845' => [
        'label' => 'Terms governing use and reproduction note',
        'repeatable' => true,
        'indicators' => [],
        'subfields' => [
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Terms governing use and reproduction', 'repeatable' => false],
            'b' => ['label' => 'Jurisdiction', 'repeatable' => false],
            'c' => ['label' => 'Authorization', 'repeatable' => false],
            'd' => ['label' => 'Authorized users', 'repeatable' => false],
        ],
    ],
    '850' => [
        'label' => 'Holding institution',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Holding institution', 'repeatable' => true],
        ],
    ],
    '852' => [
        'label' => 'Location',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Shelving scheme',
                'values' => [
                    ' ' => 'No information provided',
                    '0' => 'Library of Congress classification',
                    '1' => 'Dewey Decimal classification',
                    '2' => 'National Library of Medicine classification',
                    '3' => 'Superintendent of Documents classification',
                    '4' => 'Shelving control number',
                    '5' => 'Title',
                    '6' => 'Shelved separately',
                    '7' => 'Source specified in subfield $2',
                    '8' => 'Other scheme',
                ],
            ],
            2 => [
                'label' => 'Shelving order',
                'values' => [
                    ' ' => 'No information provided',
                    '0' => 'Not enumeration',
                    '1' => 'Primary enumeration',
                    '2' => 'Alternative enumeration',
                ],
            ],
        ],
        'subfields' => [
            '2' => ['label' => 'Source of classification or shelving scheme', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Sequence number', 'repeatable' => false],
            'a' => ['label' => 'Location', 'repeatable' => false],
            'b' => ['label' => 'Sublocation or collection', 'repeatable' => true],
            'c' => ['label' => 'Shelving location', 'repeatable' => true],
            'd' => ['label' => 'Former shelving location', 'repeatable' => true],
            'e' => ['label' => 'Address', 'repeatable' => true],
            'f' => ['label' => 'Coded location qualifier', 'repeatable' => true],
            'g' => ['label' => 'Non-coded location qualifier', 'repeatable' => true],
            'h' => ['label' => 'Classification part', 'repeatable' => false],
            'i' => ['label' => 'Item part', 'repeatable' => true],
            'j' => ['label' => 'Shelving control number', 'repeatable' => false],
            'k' => ['label' => 'Call number prefix', 'repeatable' => true],
            'l' => ['label' => 'Shelving form of title', 'repeatable' => false],
            'm' => ['label' => 'Call number suffix', 'repeatable' => true],
            'n' => ['label' => 'Country code', 'repeatable' => false],
            'p' => ['label' => 'Piece designation', 'repeatable' => false],
            'q' => ['label' => 'Piece physical condition', 'repeatable' => false],
            's' => ['label' => 'Copyright article-fee code', 'repeatable' => true],
            't' => ['label' => 'Copy number', 'repeatable' => false],
            'u' => ['label' => 'Uniform Resource Identifier', 'repeatable' => true],
            'x' => ['label' => 'Nonpublic note', 'repeatable' => true],
            'z' => ['label' => 'Public note', 'repeatable' => true],
        ],
    ],
    '853' => [
        'label' => 'Captions and pattern--basic bibliographic unit',
        'repeatable' => true,
        'indicators' => [],
        'subfields' => [
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'First level of enumeration', 'repeatable' => false],
            'b' => ['label' => 'Second level of enumeration', 'repeatable' => false],
            'c' => ['label' => 'Third level of enumeration', 'repeatable' => false],
            'd' => ['label' => 'Fourth level of enumeration', 'repeatable' => false],
            'e' => ['label' => 'Fifth level of enumeration', 'repeatable' => false],
            'f' => ['label' => 'Sixth level of enumeration', 'repeatable' => false],
            'g' => ['label' => 'Alternative numbering scheme, first level of enumeration', 'repeatable' => false],
            'h' => ['label' => 'Alternative numbering scheme, second level of enumeration', 'repeatable' => false],
            'i' => ['label' => 'First level of chronology', 'repeatable' => false],
            'j' => ['label' => 'Second level of chronology', 'repeatable' => false],
            'k' => ['label' => 'Third level of chronology', 'repeatable' => false],
            'l' => ['label' => 'Fourth level of chronology', 'repeatable' => false],
            'm' => ['label' => 'Alternative numbering scheme, chronology', 'repeatable' => false],
            'n' => ['label' => 'Pattern note', 'repeatable' => false],
            'p' => ['label' => 'Number of pieces per issuance', 'repeatable' => false],
            't' => ['label' => 'Copy', 'repeatable' => false],
            'u' => ['label' => 'Bibliographic units per next higher level', 'repeatable' => true],
            'v' => ['label' => 'Numbering continuity', 'repeatable' => true],
            'w' => ['label' => 'Frequency', 'repeatable' => false],
            'x' => ['label' => 'Calendar change', 'repeatable' => false],
            'y' => ['label' => 'Regularity pattern', 'repeatable' => true],
            'z' => ['label' => 'Numbering scheme', 'repeatable' => true],
        ],
    ],
    '854' => [
        'label' => 'Captions and pattern--supplementary material',
        'repeatable' => true,
        'indicators' => [],
        'subfields' => [
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'First level of enumeration', 'repeatable' => false],
            'b' => ['label' => 'Second level of enumeration', 'repeatable' => false],
            'c' => ['label' => 'Third level of enumeration', 'repeatable' => false],
            'd' => ['label' => 'Fourth level of enumeration', 'repeatable' => false],
            'e' => ['label' => 'Fifth level of enumeration', 'repeatable' => false],
            'f' => ['label' => 'Sixth level of enumeration', 'repeatable' => false],
            'g' => ['label' => 'Alternative numbering scheme, first level of enumeration', 'repeatable' => false],
            'h' => ['label' => 'Alternative numbering scheme, second level of enumeration', 'repeatable' => false],
            'i' => ['label' => 'First level of chronology', 'repeatable' => false],
            'j' => ['label' => 'Second level of chronology', 'repeatable' => false],
            'k' => ['label' => 'Third level of chronology', 'repeatable' => false],
            'l' => ['label' => 'Fourth level of chronology', 'repeatable' => false],
            'm' => ['label' => 'Alternative numbering scheme, chronology', 'repeatable' => false],
            'n' => ['label' => 'Pattern note', 'repeatable' => false],
            'p' => ['label' => 'Number of pieces per issuance', 'repeatable' => false],
            't' => ['label' => 'Copy', 'repeatable' => false],
            'u' => ['label' => 'Bibliographic units per next higher level', 'repeatable' => true],
            'v' => ['label' => 'Numbering continuity', 'repeatable' => true],
            'w' => ['label' => 'Frequency', 'repeatable' => false],
            'x' => ['label' => 'Calendar change', 'repeatable' => false],
            'y' => ['label' => 'Regularity pattern', 'repeatable' => true],
            'z' => ['label' => 'Numbering scheme', 'repeatable' => true],
        ],
    ],
    '855' => [
        'label' => 'Captions and pattern--indexes',
        'repeatable' => true,
        'indicators' => [],
        'subfields' => [
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'First level of enumeration', 'repeatable' => false],
            'b' => ['label' => 'Second level of enumeration', 'repeatable' => false],
            'c' => ['label' => 'Third level of enumeration', 'repeatable' => false],
            'd' => ['label' => 'Fourth level of enumeration', 'repeatable' => false],
            'e' => ['label' => 'Fifth level of enumeration', 'repeatable' => false],
            'f' => ['label' => 'Sixth level of enumeration', 'repeatable' => false],
            'g' => ['label' => 'Alternative numbering scheme, first level of enumeration', 'repeatable' => false],
            'h' => ['label' => 'Alternative numbering scheme, second level of enumeration', 'repeatable' => false],
            'i' => ['label' => 'First level of chronology', 'repeatable' => false],
            'j' => ['label' => 'Second level of chronology', 'repeatable' => false],
            'k' => ['label' => 'Third level of chronology', 'repeatable' => false],
            'l' => ['label' => 'Fourth level of chronology', 'repeatable' => false],
            'm' => ['label' => 'Alternative numbering scheme, chronology', 'repeatable' => false],
            'n' => ['label' => 'Pattern note', 'repeatable' => false],
            'p' => ['label' => 'Number of pieces per issuance', 'repeatable' => false],
            't' => ['label' => 'Copy', 'repeatable' => false],
            'u' => ['label' => 'Bibliographic units per next higher level', 'repeatable' => true],
            'v' => ['label' => 'Numbering continuity', 'repeatable' => true],
            'w' => ['label' => 'Frequency', 'repeatable' => false],
            'x' => ['label' => 'Calendar change', 'repeatable' => false],
            'y' => ['label' => 'Regularity pattern', 'repeatable' => true],
            'z' => ['label' => 'Numbering scheme', 'repeatable' => true],
        ],
    ],
    '856' => [
        'label' => 'Electronic location and access',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Access method',
                'values' => [
                    ' ' => 'No information provided',
                    '0' => 'Email',
                    '1' => 'FTP',
                    '2' => 'Remote login (Telnet)',
                    '3' => 'Dial-up',
                    '4' => 'HTTP',
                    '7' => 'Method specified in subfield $2',
                ],
            ],
            2 => [
                'label' => 'Relationship',
                'values' => [
                    ' ' => 'No information provided',
                    '0' => 'Resource',
                    '1' => 'Version of resource',
                    '2' => 'Related resource',
                    '3' => 'Component part(s) of resource',
                    '4' => 'Version of component part(s) of resource',
                    '8' => 'No display constant generated',
                ],
            ],
        ],
        'subfields' => [
            '2' => ['label' => 'Access method', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Access status', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Host name', 'repeatable' => true],
            'c' => ['label' => 'Compression information', 'repeatable' => true],
            'd' => ['label' => 'Path', 'repeatable' => true],
            'e' => ['label' => 'Data provenance', 'repeatable' => true],
            'f' => ['label' => 'Electronic name', 'repeatable' => true],
            'g' => ['label' => 'Persistent identifier', 'repeatable' => true],
            'h' => ['label' => 'Non-functioning Uniform Resource Identifier', 'repeatable' => true],
            'l' => ['label' => 'Standardized information governing access', 'repeatable' => true],
            'm' => ['label' => 'Contact for access assistance', 'repeatable' => true],
            'n' => ['label' => 'Terms governing access', 'repeatable' => true],
            'o' => ['label' => 'Operating system', 'repeatable' => false],
            'p' => ['label' => 'Port', 'repeatable' => false],
            'q' => ['label' => 'Electronic format type', 'repeatable' => true],
            'r' => ['label' => 'Standardized information governing use and reproduction', 'repeatable' => true],
            's' => ['label' => 'File size', 'repeatable' => true],
            't' => ['label' => 'Terms governing use and reproduction', 'repeatable' => true],
            'u' => ['label' => 'Uniform Resource Identifier', 'repeatable' => true],
            'v' => ['label' => 'Hours access method available', 'repeatable' => true],
            'w' => ['label' => 'Record control number', 'repeatable' => true],
            'x' => ['label' => 'Nonpublic note', 'repeatable' => true],
            'y' => ['label' => 'Link text', 'repeatable' => true],
            'z' => ['label' => 'Public note', 'repeatable' => true],
        ],
    ],
    '857' => [
        'label' => 'Electronic archive location and access',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Access method',
                'values' => [
                    ' ' => 'No information provided',
                    '1' => 'FTP',
                    '4' => 'HTTP',
                    '7' => 'Method specified in subfield $2',
                ],
            ],
            2 => [
                'label' => 'Relationship',
                'values' => [
                    ' ' => 'No information provided',
                    '0' => 'Resource',
                    '1' => 'Version of resource',
                    '2' => 'Related resource',
                    '3' => 'Component part(s) of resource',
                    '4' => 'Version of component part(s) of resource',
                    '8' => 'No display constant generated',
                ],
            ],
        ],
        'subfields' => [
            '2' => ['label' => 'Access method', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Access status', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'b' => ['label' => 'Name of archiving agency', 'repeatable' => false],
            'c' => ['label' => 'Name of Web archive or digital archive repository', 'repeatable' => false],
            'd' => ['label' => 'Date range of archived material', 'repeatable' => false],
            'e' => ['label' => 'Data provenance', 'repeatable' => true],
            'f' => ['label' => 'Archive completeness', 'repeatable' => false],
            'g' => ['label' => 'Persistent identifier', 'repeatable' => true],
            'h' => ['label' => 'Non-functioning Uniform Resource Identifier', 'repeatable' => true],
            'l' => ['label' => 'Standardized information governing access', 'repeatable' => true],
            'm' => ['label' => 'Contact for access assistance', 'repeatable' => true],
            'n' => ['label' => 'Terms governing access', 'repeatable' => true],
            'q' => ['label' => 'Electronic format type', 'repeatable' => true],
            'r' => ['label' => 'Standardized information governing use and reproduction', 'repeatable' => true],
            's' => ['label' => 'File size', 'repeatable' => true],
            't' => ['label' => 'Terms governing use and reproduction', 'repeatable' => true],
            'u' => ['label' => 'Uniform Resource Identifier', 'repeatable' => true],
            'x' => ['label' => 'Nonpublic note', 'repeatable' => true],
            'y' => ['label' => 'Link text', 'repeatable' => true],
            'z' => ['label' => 'Public note', 'repeatable' => true],
        ],
    ],
    '863' => [
        'label' => 'Enumeration and chronology--basic bibliographic unit',
        'repeatable' => true,
        'indicators' => [],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => false],
            'a' => ['label' => 'First level of enumeration', 'repeatable' => false],
            'b' => ['label' => 'Second level of enumeration', 'repeatable' => false],
            'c' => ['label' => 'Third level of enumeration', 'repeatable' => false],
            'd' => ['label' => 'Fourth level of enumeration', 'repeatable' => false],
            'e' => ['label' => 'Fifth level of enumeration', 'repeatable' => false],
            'f' => ['label' => 'Sixth level of enumeration', 'repeatable' => false],
            'g' => ['label' => 'Alternative numbering scheme, first level of enumeration', 'repeatable' => false],
            'h' => ['label' => 'Alternative numbering scheme, second level of enumeration', 'repeatable' => false],
            'i' => ['label' => 'First level of chronology', 'repeatable' => false],
            'j' => ['label' => 'Second level of chronology', 'repeatable' => false],
            'k' => ['label' => 'Third level of chronology', 'repeatable' => false],
            'l' => ['label' => 'Fourth level of chronology', 'repeatable' => false],
            'm' => ['label' => 'Alternative numbering scheme, chronology', 'repeatable' => false],
            'n' => ['label' => 'Converted Gregorian year', 'repeatable' => false],
            'o' => ['label' => 'Type of unit', 'repeatable' => true],
            'p' => ['label' => 'Piece designation', 'repeatable' => false],
            'q' => ['label' => 'Piece physical condition', 'repeatable' => false],
            's' => ['label' => 'Copyright article-fee code', 'repeatable' => true],
            't' => ['label' => 'Copy number', 'repeatable' => false],
            'v' => ['label' => 'Issuing date', 'repeatable' => true],
            'w' => ['label' => 'Break indicator', 'repeatable' => false],
            'x' => ['label' => 'Nonpublic note', 'repeatable' => true],
            'z' => ['label' => 'Public note', 'repeatable' => true],
        ],
    ],
    '864' => [
        'label' => 'Enumeration and chronology--supplementary material',
        'repeatable' => true,
        'indicators' => [],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => false],
            'a' => ['label' => 'First level of enumeration', 'repeatable' => false],
            'b' => ['label' => 'Second level of enumeration', 'repeatable' => false],
            'c' => ['label' => 'Third level of enumeration', 'repeatable' => false],
            'd' => ['label' => 'Fourth level of enumeration', 'repeatable' => false],
            'e' => ['label' => 'Fifth level of enumeration', 'repeatable' => false],
            'f' => ['label' => 'Sixth level of enumeration', 'repeatable' => false],
            'g' => ['label' => 'Alternative numbering scheme, first level of enumeration', 'repeatable' => false],
            'h' => ['label' => 'Alternative numbering scheme, second level of enumeration', 'repeatable' => false],
            'i' => ['label' => 'First level of chronology', 'repeatable' => false],
            'j' => ['label' => 'Second level of chronology', 'repeatable' => false],
            'k' => ['label' => 'Third level of chronology', 'repeatable' => false],
            'l' => ['label' => 'Fourth level of chronology', 'repeatable' => false],
            'm' => ['label' => 'Alternative numbering scheme, chronology', 'repeatable' => false],
            'n' => ['label' => 'Converted Gregorian year', 'repeatable' => false],
            'o' => ['label' => 'Type of unit', 'repeatable' => true],
            'p' => ['label' => 'Piece designation', 'repeatable' => false],
            'q' => ['label' => 'Piece physical condition', 'repeatable' => false],
            's' => ['label' => 'Copyright article-fee code', 'repeatable' => true],
            't' => ['label' => 'Copy number', 'repeatable' => false],
            'v' => ['label' => 'Issuing date', 'repeatable' => true],
            'w' => ['label' => 'Break indicator', 'repeatable' => false],
            'x' => ['label' => 'Nonpublic note', 'repeatable' => true],
            'z' => ['label' => 'Public note', 'repeatable' => true],
        ],
    ],
    '865' => [
        'label' => 'Enumeration and chronology--indexes',
        'repeatable' => true,
        'indicators' => [],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => false],
            'a' => ['label' => 'First level of enumeration', 'repeatable' => false],
            'b' => ['label' => 'Second level of enumeration', 'repeatable' => false],
            'c' => ['label' => 'Third level of enumeration', 'repeatable' => false],
            'd' => ['label' => 'Fourth level of enumeration', 'repeatable' => false],
            'e' => ['label' => 'Fifth level of enumeration', 'repeatable' => false],
            'f' => ['label' => 'Sixth level of enumeration', 'repeatable' => false],
            'g' => ['label' => 'Alternative numbering scheme, first level of enumeration', 'repeatable' => false],
            'h' => ['label' => 'Alternative numbering scheme, second level of enumeration', 'repeatable' => false],
            'i' => ['label' => 'First level of chronology', 'repeatable' => false],
            'j' => ['label' => 'Second level of chronology', 'repeatable' => false],
            'k' => ['label' => 'Third level of chronology', 'repeatable' => false],
            'l' => ['label' => 'Fourth level of chronology', 'repeatable' => false],
            'm' => ['label' => 'Alternative numbering scheme, chronology', 'repeatable' => false],
            'n' => ['label' => 'Converted Gregorian year', 'repeatable' => false],
            'o' => ['label' => 'Type of unit', 'repeatable' => true],
            'p' => ['label' => 'Piece designation', 'repeatable' => false],
            'q' => ['label' => 'Piece physical condition', 'repeatable' => false],
            's' => ['label' => 'Copyright article-fee code', 'repeatable' => true],
            't' => ['label' => 'Copy number', 'repeatable' => false],
            'v' => ['label' => 'Issuing date', 'repeatable' => true],
            'w' => ['label' => 'Break indicator', 'repeatable' => false],
            'x' => ['label' => 'Nonpublic note', 'repeatable' => true],
            'z' => ['label' => 'Public note', 'repeatable' => true],
        ],
    ],
    '866' => [
        'label' => 'Textual holdings--basic bibliographic unit',
        'repeatable' => true,
        'indicators' => [],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Textual string', 'repeatable' => false],
            'x' => ['label' => 'Nonpublic note', 'repeatable' => true],
            'z' => ['label' => 'Public note', 'repeatable' => true],
        ],
    ],
    '867' => [
        'label' => 'Textual holdings--supplementary material',
        'repeatable' => true,
        'indicators' => [],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Textual string', 'repeatable' => false],
            'x' => ['label' => 'Nonpublic note', 'repeatable' => true],
            'z' => ['label' => 'Public note', 'repeatable' => true],
        ],
    ],
    '868' => [
        'label' => 'Textual holdings--indexes',
        'repeatable' => true,
        'indicators' => [],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Textual string', 'repeatable' => false],
            'x' => ['label' => 'Nonpublic note', 'repeatable' => true],
            'z' => ['label' => 'Public note', 'repeatable' => true],
        ],
    ],
    '876' => [
        'label' => 'Item information--basic bibliographic unit',
        'repeatable' => true,
        'indicators' => [],
        'subfields' => [
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Sequence number', 'repeatable' => true],
            'a' => ['label' => 'Internal item number', 'repeatable' => false],
            'b' => ['label' => 'Invalid or canceled internal item number', 'repeatable' => true],
            'c' => ['label' => 'Cost', 'repeatable' => true],
            'd' => ['label' => 'Date acquired', 'repeatable' => true],
            'e' => ['label' => 'Source of acquisition', 'repeatable' => true],
            'h' => ['label' => 'Use restrictions', 'repeatable' => true],
            'j' => ['label' => 'Item status', 'repeatable' => true],
            'l' => ['label' => 'Temporary location', 'repeatable' => true],
            'p' => ['label' => 'Piece designation', 'repeatable' => true],
            'r' => ['label' => 'Invalid or canceled piece designation', 'repeatable' => true],
            't' => ['label' => 'Copy number', 'repeatable' => false],
            'x' => ['label' => 'Nonpublic note', 'repeatable' => true],
            'z' => ['label' => 'Public note', 'repeatable' => true],
        ],
    ],
    '877' => [
        'label' => 'Item information--supplementary material',
        'repeatable' => true,
        'indicators' => [],
        'subfields' => [
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Sequence number', 'repeatable' => true],
            'a' => ['label' => 'Internal item number', 'repeatable' => false],
            'b' => ['label' => 'Invalid or canceled internal item number', 'repeatable' => true],
            'c' => ['label' => 'Cost', 'repeatable' => true],
            'd' => ['label' => 'Date acquired', 'repeatable' => true],
            'e' => ['label' => 'Source of acquisition', 'repeatable' => true],
            'h' => ['label' => 'Use restrictions', 'repeatable' => true],
            'j' => ['label' => 'Item status', 'repeatable' => true],
            'l' => ['label' => 'Temporary location', 'repeatable' => true],
            'p' => ['label' => 'Piece designation', 'repeatable' => true],
            'r' => ['label' => 'Invalid or canceled piece designation', 'repeatable' => true],
            't' => ['label' => 'Copy number', 'repeatable' => false],
            'x' => ['label' => 'Nonpublic note', 'repeatable' => true],
            'z' => ['label' => 'Public note', 'repeatable' => true],
        ],
    ],
    '878' => [
        'label' => 'Item information--indexes',
        'repeatable' => true,
        'indicators' => [],
        'subfields' => [
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Sequence number', 'repeatable' => true],
            'a' => ['label' => 'Internal item number', 'repeatable' => false],
            'b' => ['label' => 'Invalid or canceled internal item number', 'repeatable' => true],
            'c' => ['label' => 'Cost', 'repeatable' => true],
            'd' => ['label' => 'Date acquired', 'repeatable' => true],
            'e' => ['label' => 'Source of acquisition', 'repeatable' => true],
            'h' => ['label' => 'Use restrictions', 'repeatable' => true],
            'j' => ['label' => 'Item status', 'repeatable' => true],
            'l' => ['label' => 'Temporary location', 'repeatable' => true],
            'p' => ['label' => 'Piece designation', 'repeatable' => true],
            'r' => ['label' => 'Invalid or canceled piece designation', 'repeatable' => true],
            't' => ['label' => 'Copy number', 'repeatable' => false],
            'x' => ['label' => 'Nonpublic note', 'repeatable' => true],
            'z' => ['label' => 'Public note', 'repeatable' => true],
        ],
    ],
    '880' => [
        'label' => 'Alternate graphic representation',
        'repeatable' => true,
        'indicators' => [],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
        ],
    ],
    '881' => [
        'label' => 'Manifestation statements',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Manifestation statement, high-level/general', 'repeatable' => true],
            'b' => ['label' => 'Manifestation identifier statement', 'repeatable' => true],
            'c' => ['label' => 'Manifestation title and responsibility statement', 'repeatable' => true],
            'd' => ['label' => 'Manifestation edition statement', 'repeatable' => true],
            'e' => ['label' => 'Manifestation production statement', 'repeatable' => true],
            'f' => ['label' => 'Manifestation publication statement', 'repeatable' => true],
            'g' => ['label' => 'Manifestation distribution statement', 'repeatable' => true],
            'h' => ['label' => 'Manifestation manufacture statement', 'repeatable' => true],
            'i' => ['label' => 'Manifestation copyright statement', 'repeatable' => true],
            'j' => ['label' => 'Manifestation frequency statement', 'repeatable' => true],
            'k' => ['label' => 'Manifestation designation of sequence statement', 'repeatable' => true],
            'l' => ['label' => 'Manifestation series statement', 'repeatable' => true],
            'm' => ['label' => 'Manifestation dissertation statement', 'repeatable' => true],
            'n' => ['label' => 'Manifestation regional encoding statement', 'repeatable' => true],
        ],
    ],
    '882' => [
        'label' => 'Replacement record information',
        'repeatable' => false,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Replacement title', 'repeatable' => true],
            'i' => ['label' => 'Explanatory text', 'repeatable' => true],
            'w' => ['label' => 'Replacement bibliographic record control number', 'repeatable' => true],
        ],
    ],
    '883' => [
        'label' => 'Metadata provenance',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Method of assignment',
                'values' => [
                    ' ' => 'No information provided/not applicable',
                    '0' => 'Fully machine-generated',
                    '1' => 'Partially machine-generated',
                    '2' => 'Not machine-generated',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Creation process', 'repeatable' => false],
            'c' => ['label' => 'Confidence value', 'repeatable' => false],
            'd' => ['label' => 'Creation date', 'repeatable' => false],
            'q' => ['label' => 'Assigning or generating agency', 'repeatable' => false],
            'u' => ['label' => 'Uniform Resource Identifier', 'repeatable' => false],
            'w' => ['label' => 'Bibliographic record control number', 'repeatable' => true],
            'x' => ['label' => 'Validity end date', 'repeatable' => false],
        ],
    ],
    '884' => [
        'label' => 'Description conversion information',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            'a' => ['label' => 'Conversion process', 'repeatable' => false],
            'g' => ['label' => 'Conversion date/time', 'repeatable' => false],
            'k' => ['label' => 'Identifier of source metadata', 'repeatable' => false],
            'q' => ['label' => 'Conversion agency', 'repeatable' => false],
            'u' => ['label' => 'Uniform Resource Identifier', 'repeatable' => true],
        ],
    ],
    '885' => [
        'label' => 'Matching information',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source', 'repeatable' => false],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => false],
            'a' => ['label' => 'Matching information', 'repeatable' => false],
            'b' => ['label' => 'Status of matching and its checking', 'repeatable' => false],
            'c' => ['label' => 'Confidence value', 'repeatable' => false],
            'd' => ['label' => 'Generation date', 'repeatable' => false],
            'w' => ['label' => 'Record control number', 'repeatable' => true],
            'x' => ['label' => 'Nonpublic note', 'repeatable' => true],
            'z' => ['label' => 'Public note', 'repeatable' => true],
        ],
    ],
    '886' => [
        'label' => 'Foreign marc information field',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Type of field',
                'values' => [
                    '0' => 'Leader',
                    '1' => 'Variable control fields (002-009)',
                    '2' => 'Variable data fields (010-999)',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '2' => ['label' => 'Source of data', 'repeatable' => false],
            'a' => ['label' => 'Tag of the foreign MARC field', 'repeatable' => false],
            'b' => ['label' => 'Content of the foreign MARC field', 'repeatable' => false],
        ],
    ],
    '887' => [
        'label' => 'Non-marc information field',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '2' => ['label' => 'Source of data', 'repeatable' => false],
            'a' => ['label' => 'Content of non-MARC field', 'repeatable' => false],
        ],
    ],
    ];

    public static function exists(string $tag): bool
    {
        return isset(self::TAGS[$tag]);
    }

    public static function isLocal(string $tag): bool
    {
        return !isset(self::TAGS[$tag]) && str_contains($tag, '9');
    }

    public static function isLocalSubfield(string $code): bool
    {
        return $code === '9';
    }

    public static function acceptsAnySubfield(string $tag): bool
    {
        return $tag === '880' || $tag === '886';
    }

    public static function label(string $tag): ?string
    {
        return self::TAGS[$tag]['label'] ?? null;
    }

    public static function isRepeatable(string $tag): ?bool
    {
        return self::TAGS[$tag]['repeatable'] ?? null;
    }

    public static function subfieldLabel(string $tag, string $code): ?string
    {
        return self::TAGS[$tag]['subfields'][$code]['label'] ?? null;
    }

    public static function subfieldExists(string $tag, string $code): bool
    {
        return isset(self::TAGS[$tag]['subfields'][$code]);
    }

    public static function isSubfieldRepeatable(string $tag, string $code): ?bool
    {
        return self::TAGS[$tag]['subfields'][$code]['repeatable'] ?? null;
    }

    /**
     * @return array<string, array{label: string, repeatable: bool}>
     */
    public static function subfields(string $tag): array
    {
        return self::TAGS[$tag]['subfields'] ?? [];
    }

    public static function indicatorLabel(string $tag, int $position): ?string
    {
        return self::TAGS[$tag]['indicators'][$position]['label'] ?? null;
    }

    /**
     * @return array<string, string>
     */
    public static function indicatorValues(string $tag, int $position): array
    {
        return self::TAGS[$tag]['indicators'][$position]['values'] ?? [];
    }

    public static function indicatorIsDefined(string $tag, int $position, string $value): ?bool
    {
        $values = self::indicatorValues($tag, $position);

        return $values === [] ? null : isset($values[$value]);
    }
}
