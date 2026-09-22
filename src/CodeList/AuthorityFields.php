<?php

declare(strict_types=1);

namespace MirayS\Marc\CodeList;

final class AuthorityFields
{
    public const FORMAT = 'MARC 21 Authority';

    public const SOURCE = 'https://www.loc.gov/marc/authority/ecadlist.html';

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
    '008' => [
        'label' => 'Fixed-length data elements',
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
            'z' => ['label' => 'Canceled/invalid LC control number', 'repeatable' => true],
        ],
    ],
    '014' => [
        'label' => 'Link to bibliographic record for serial or multipart item',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Control number of related bibliographic record', 'repeatable' => false],
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
            'z' => ['label' => 'Canceled/invalid record control number', 'repeatable' => true],
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
                    '7' => 'Source specified in subfield $2',
                    '8' => 'Unspecified type of standard number or code',
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
            '1' => ['label' => 'Real World Object URI', 'repeatable' => false],
            '2' => ['label' => 'Source', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Standard number or code', 'repeatable' => false],
            'c' => ['label' => 'Terms of availability', 'repeatable' => false],
            'd' => ['label' => 'Additional codes following the standard number or code', 'repeatable' => false],
            'q' => ['label' => 'Qualifying information', 'repeatable' => true],
            'z' => ['label' => 'Canceled/invalid standard number or code', 'repeatable' => true],
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
    '034' => [
        'label' => 'Coded cartographic mathematical data',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
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
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'd' => ['label' => 'Coordinates - westernmost longitude', 'repeatable' => false],
            'e' => ['label' => 'Coordinates - easternmost longitude', 'repeatable' => false],
            'f' => ['label' => 'Coordinates - northernmost latitude', 'repeatable' => false],
            'g' => ['label' => 'Coordinates - southernmost latitude', 'repeatable' => false],
            'j' => ['label' => 'Declination - northern limit', 'repeatable' => false],
            'k' => ['label' => 'Declination - southern limit', 'repeatable' => false],
            'm' => ['label' => 'Right ascension - eastern limit', 'repeatable' => false],
            'n' => ['label' => 'Right ascension - western limit', 'repeatable' => false],
            'p' => ['label' => 'Equinox', 'repeatable' => false],
            'r' => ['label' => 'Distance from earth', 'repeatable' => true],
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
            'z' => ['label' => 'Canceled/invalid system control number', 'repeatable' => true],
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
            'f' => ['label' => 'Subject heading or thesaurus conventions', 'repeatable' => false],
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
        'subfields' => [],
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
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Geographic area code', 'repeatable' => true],
            'b' => ['label' => 'Local GAC code', 'repeatable' => true],
            'c' => ['label' => 'ISO code', 'repeatable' => true],
        ],
    ],
    '045' => [
        'label' => 'Time period of heading',
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
            '2' => ['label' => 'Source of date scheme', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'f' => ['label' => 'Birth date', 'repeatable' => false],
            'g' => ['label' => 'Death date', 'repeatable' => false],
            'k' => ['label' => 'Beginning or single date created', 'repeatable' => false],
            'l' => ['label' => 'Ending date created', 'repeatable' => false],
            'o' => ['label' => 'Single or starting date for aggregated content', 'repeatable' => false],
            'p' => ['label' => 'Ending date for aggregated content', 'repeatable' => false],
            'q' => ['label' => 'Establishment date', 'repeatable' => false],
            'r' => ['label' => 'Termination date', 'repeatable' => false],
            's' => ['label' => 'Start period', 'repeatable' => false],
            't' => ['label' => 'End period', 'repeatable' => false],
            'u' => ['label' => 'Uniform Resource Identifier', 'repeatable' => true],
            'v' => ['label' => 'Source of information', 'repeatable' => true],
            'x' => ['label' => 'Nonpublic note', 'repeatable' => true],
            'z' => ['label' => 'Public note', 'repeatable' => true],
        ],
    ],
    '050' => [
        'label' => 'Library of congress call number',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
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
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Classification number', 'repeatable' => false],
            'b' => ['label' => 'Item number', 'repeatable' => false],
            'd' => ['label' => 'Volumes/dates to which call number applies', 'repeatable' => false],
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
    '053' => [
        'label' => 'Lc classification number',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Source of classification number',
                'values' => [
                    '0' => 'Assigned by LC',
                    '4' => 'Assigned by agency other than LC',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Classification number element--single number or beginning number of span', 'repeatable' => false],
            'b' => ['label' => 'Classification number element--ending number of span', 'repeatable' => false],
            'c' => ['label' => 'Explanatory term', 'repeatable' => false],
        ],
    ],
    '055' => [
        'label' => 'Library and archives canada call number',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Source of call number',
                'values' => [
                    '0' => 'Assigned by LAC',
                    '4' => 'Assigned by agency other than LAC',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Number source', 'repeatable' => false],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Classification number', 'repeatable' => false],
            'b' => ['label' => 'Item number', 'repeatable' => false],
            'd' => ['label' => 'Volumes/dates to which call number applies', 'repeatable' => false],
        ],
    ],
    '060' => [
        'label' => 'National library of medicine call number',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
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
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Classification number', 'repeatable' => false],
            'b' => ['label' => 'Item number', 'repeatable' => false],
            'd' => ['label' => 'Volumes/dates to which call number applies', 'repeatable' => false],
        ],
    ],
    '065' => [
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
            '2' => ['label' => 'Number source', 'repeatable' => false],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Classification number element-single number or beginning of span', 'repeatable' => false],
            'b' => ['label' => 'Classification number element-ending number of span', 'repeatable' => false],
            'c' => ['label' => 'Explanatory term', 'repeatable' => false],
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
            'a' => ['label' => 'Classification number', 'repeatable' => false],
            'b' => ['label' => 'Item number', 'repeatable' => false],
            'd' => ['label' => 'Volume/dates to which call number applies', 'repeatable' => false],
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
                    ' ' => 'No information provided',
                    '0' => 'NAL subject category code list',
                    '7' => 'Source specified in subfield $2',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Code source', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Subject category code', 'repeatable' => false],
            'b' => ['label' => 'Type of entity code', 'repeatable' => true],
            'x' => ['label' => 'Subject category code subdivision', 'repeatable' => true],
            'z' => ['label' => 'Code source', 'repeatable' => false],
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
        'label' => 'Dewey decimal call number',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Type of edition',
                'values' => [
                    '0' => 'Full',
                    '1' => 'Abridged',
                    '7' => 'Other edition specified in subfield $2',
                ],
            ],
            2 => [
                'label' => 'Source of call number',
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
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Classification number', 'repeatable' => false],
            'b' => ['label' => 'Item number', 'repeatable' => false],
            'd' => ['label' => 'Volumes/dates to which call number applies', 'repeatable' => false],
        ],
    ],
    '083' => [
        'label' => 'Dewey decimal classification number',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Type of edition',
                'values' => [
                    '0' => 'Full',
                    '1' => 'Abridged',
                    '7' => 'Other edition specified in subfield $2',
                ],
            ],
            2 => [
                'label' => 'Source of classification number',
                'values' => [
                    '0' => 'Assigned by LC',
                    '4' => 'Assigned by agency other than LC',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Edition information', 'repeatable' => false],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Classification number element--single number or beginning number of span', 'repeatable' => false],
            'b' => ['label' => 'Classification number element--ending number of span', 'repeatable' => false],
            'c' => ['label' => 'Explanatory term', 'repeatable' => false],
            'y' => ['label' => 'Table sequence number for internal subarrangement or add table', 'repeatable' => true],
            'z' => ['label' => 'Table identification--table number', 'repeatable' => false],
        ],
    ],
    '086' => [
        'label' => 'Government document call number',
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
            '2' => ['label' => 'Number source', 'repeatable' => false],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Call number', 'repeatable' => false],
            'd' => ['label' => 'Volumes/dates to which call number applies', 'repeatable' => false],
            'z' => ['label' => 'Canceled/invalid call number', 'repeatable' => false],
        ],
    ],
    '087' => [
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
            'a' => ['label' => 'Classification number element--Single number or beginning number of span', 'repeatable' => false],
            'b' => ['label' => 'Classification number element--Ending number of span', 'repeatable' => false],
            'c' => ['label' => 'Explanatory information', 'repeatable' => false],
        ],
    ],
    '100' => [
        'label' => 'Heading--personal name',
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
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '110' => [
        'label' => 'Heading--corporate name',
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
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '111' => [
        'label' => 'Heading--meeting name',
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
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '130' => [
        'label' => 'Heading--uniform title',
        'repeatable' => false,
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
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '147' => [
        'label' => 'Heading--named event',
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
            'a' => ['label' => 'Named event', 'repeatable' => false],
            'c' => ['label' => 'Location of named event', 'repeatable' => true],
            'd' => ['label' => 'Date of named event', 'repeatable' => false],
            'g' => ['label' => 'Miscellaneous information', 'repeatable' => true],
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '148' => [
        'label' => 'Heading--chronological term',
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
            'a' => ['label' => 'Chronological term', 'repeatable' => false],
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '150' => [
        'label' => 'Heading--topical term',
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
            'a' => ['label' => 'Topical term or geographic name entry element', 'repeatable' => false],
            'b' => ['label' => 'Topical term following geographic name entry element', 'repeatable' => false],
            'g' => ['label' => 'Miscellaneous information', 'repeatable' => true],
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '151' => [
        'label' => 'Heading--geographic name',
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
            'a' => ['label' => 'Geographic name', 'repeatable' => false],
            'g' => ['label' => 'Miscellaneous information', 'repeatable' => true],
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '155' => [
        'label' => 'Heading--genre/form term',
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
            'a' => ['label' => 'Genre/form term', 'repeatable' => false],
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '180' => [
        'label' => 'Heading--general subdivision',
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
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '181' => [
        'label' => 'Heading--geographic subdivision',
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
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '182' => [
        'label' => 'Heading--chronological subdivision',
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
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '185' => [
        'label' => 'Heading--form subdivision',
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
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '260' => [
        'label' => 'Complex see reference--subject',
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
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Heading referred to', 'repeatable' => true],
            'i' => ['label' => 'Explanatory text', 'repeatable' => true],
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
    '348' => [
        'label' => 'Format of notated music',
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
        ],
    ],
    '360' => [
        'label' => 'Complex see also reference--subject',
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
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Heading referred to', 'repeatable' => true],
            'i' => ['label' => 'Explanatory text', 'repeatable' => true],
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
    '368' => [
        'label' => 'Other attributes of person or corporate body',
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
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Type of corporate body', 'repeatable' => true],
            'b' => ['label' => 'Type of jurisdiction', 'repeatable' => true],
            'c' => ['label' => 'Other designation', 'repeatable' => true],
            'd' => ['label' => 'Title of person', 'repeatable' => true],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            's' => ['label' => 'Start period', 'repeatable' => false],
            't' => ['label' => 'End period', 'repeatable' => false],
            'u' => ['label' => 'Uniform REsource Identifier', 'repeatable' => true],
            'v' => ['label' => 'Source of information', 'repeatable' => true],
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
            '2' => ['label' => 'Source of term', 'repeatable' => true],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Place of birth', 'repeatable' => false],
            'b' => ['label' => 'Place of death', 'repeatable' => false],
            'c' => ['label' => 'Associated country', 'repeatable' => true],
            'e' => ['label' => 'Place of residence/headquarters', 'repeatable' => true],
            'f' => ['label' => 'Other associated place', 'repeatable' => true],
            'g' => ['label' => 'Place of origin of work or expression', 'repeatable' => true],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            's' => ['label' => 'Start period', 'repeatable' => false],
            't' => ['label' => 'End period', 'repeatable' => false],
            'u' => ['label' => 'Uniform Resource Identifier', 'repeatable' => true],
            'v' => ['label' => 'Source of information', 'repeatable' => true],
        ],
    ],
    '371' => [
        'label' => 'Address',
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
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Address', 'repeatable' => true],
            'b' => ['label' => 'City', 'repeatable' => false],
            'c' => ['label' => 'Intermediate jurisdiction', 'repeatable' => false],
            'd' => ['label' => 'Country', 'repeatable' => false],
            'e' => ['label' => 'Postal code', 'repeatable' => false],
            'm' => ['label' => 'Electronic mail address', 'repeatable' => true],
            's' => ['label' => 'Start period', 'repeatable' => false],
            't' => ['label' => 'End period', 'repeatable' => false],
            'u' => ['label' => 'Uniform Resource Identifier', 'repeatable' => true],
            'v' => ['label' => 'Source of information', 'repeatable' => true],
            'z' => ['label' => 'Public note', 'repeatable' => true],
        ],
    ],
    '372' => [
        'label' => 'Field of activity',
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
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Field of activity', 'repeatable' => true],
            's' => ['label' => 'Start period', 'repeatable' => false],
            't' => ['label' => 'End period', 'repeatable' => false],
            'u' => ['label' => 'Uniform Resource Identifier', 'repeatable' => true],
            'v' => ['label' => 'Source of information', 'repeatable' => true],
        ],
    ],
    '373' => [
        'label' => 'Associated group',
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
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Associated group', 'repeatable' => true],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            's' => ['label' => 'Start period', 'repeatable' => false],
            't' => ['label' => 'End period', 'repeatable' => false],
            'u' => ['label' => 'Uniform Resource Identifier', 'repeatable' => true],
            'v' => ['label' => 'Source of information', 'repeatable' => true],
        ],
    ],
    '374' => [
        'label' => 'Occupation',
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
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Occupation', 'repeatable' => true],
            's' => ['label' => 'Start period', 'repeatable' => false],
            't' => ['label' => 'End period', 'repeatable' => false],
            'u' => ['label' => 'Uniform Resource Identifier', 'repeatable' => true],
            'v' => ['label' => 'Source of information', 'repeatable' => true],
        ],
    ],
    '375' => [
        'label' => 'Gender',
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
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Gender', 'repeatable' => true],
            's' => ['label' => 'Start period', 'repeatable' => false],
            't' => ['label' => 'End period', 'repeatable' => false],
            'u' => ['label' => 'Uniform Resource Identifier', 'repeatable' => true],
            'v' => ['label' => 'Source of information', 'repeatable' => true],
        ],
    ],
    '376' => [
        'label' => 'Family information',
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
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Type of family', 'repeatable' => true],
            'b' => ['label' => 'Name of prominent member', 'repeatable' => true],
            'c' => ['label' => 'Hereditary title', 'repeatable' => true],
            'd' => ['label' => 'Other designation', 'repeatable' => true],
            'i' => ['label' => 'Relationhip information', 'repeatable' => true],
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
                    '7' => 'Source specified in $2',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of term', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Language code', 'repeatable' => true],
            'l' => ['label' => 'Language term', 'repeatable' => true],
        ],
    ],
    '378' => [
        'label' => 'Fuller form of personal name',
        'repeatable' => false,
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
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'q' => ['label' => 'Fuller form of personal name', 'repeatable' => false],
            'u' => ['label' => 'Uniform Resource Identifier', 'repeatable' => true],
            'v' => ['label' => 'Source of information', 'repeatable' => true],
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
            '0' => ['label' => 'Authority record control number or standard', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of term', 'repeatable' => false],
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
        'repeatable' => false,
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
    '400' => [
        'label' => 'See from tracing--personal name',
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
                'label' => 'Preferred variant heading',
                'values' => [
                    ' ' => 'No information provided',
                    '1' => 'Preferred variant heading',
                ],
            ],
        ],
        'subfields' => [
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
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
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'w' => ['label' => 'Control subfield', 'repeatable' => false],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '410' => [
        'label' => 'See from tracing--corporate name',
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
                'label' => 'Preferred variant heading',
                'values' => [
                    ' ' => 'No information provided',
                    '1' => 'Preferred variant heading',
                ],
            ],
        ],
        'subfields' => [
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
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
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'w' => ['label' => 'Control subfield', 'repeatable' => false],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '411' => [
        'label' => 'See from tracing--meeting name',
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
                'label' => 'Preferred variant heading',
                'values' => [
                    ' ' => 'No information provided',
                    '1' => 'Preferred variant heading',
                ],
            ],
        ],
        'subfields' => [
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
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
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'w' => ['label' => 'Control subfield', 'repeatable' => false],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '430' => [
        'label' => 'See from tracing--uniform title',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Preferred variant heading',
                'values' => [
                    ' ' => 'No information provided',
                    '1' => 'Preferred variant heading',
                ],
            ],
        ],
        'subfields' => [
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
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
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'w' => ['label' => 'Control subfield', 'repeatable' => false],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '447' => [
        'label' => 'See from tracing--named event',
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
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Named event', 'repeatable' => false],
            'c' => ['label' => 'Location of named event', 'repeatable' => true],
            'd' => ['label' => 'Date of named event', 'repeatable' => false],
            'g' => ['label' => 'Miscellaneous information', 'repeatable' => true],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'w' => ['label' => 'Control subfield', 'repeatable' => false],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '448' => [
        'label' => 'See from tracing--chronological term',
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
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Chronological term', 'repeatable' => false],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'w' => ['label' => 'Control subfield', 'repeatable' => false],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '450' => [
        'label' => 'See from tracing--topical term',
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
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Topical term or geographic name entry element', 'repeatable' => false],
            'b' => ['label' => 'Topical term following geographic name entry element', 'repeatable' => false],
            'g' => ['label' => 'Miscellaneous information', 'repeatable' => true],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'w' => ['label' => 'Control subfield', 'repeatable' => false],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '451' => [
        'label' => 'See from tracing--geographic name',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                ],
            ],
            2 => [
                'label' => 'Preferred variant heading',
                'values' => [
                    ' ' => 'No information provided',
                    '1' => 'Preferred variant heading',
                ],
            ],
        ],
        'subfields' => [
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Geographic name', 'repeatable' => false],
            'g' => ['label' => 'Miscellaneous information', 'repeatable' => true],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'w' => ['label' => 'Control subfield', 'repeatable' => false],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '455' => [
        'label' => 'See from tracing--genre/form term',
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
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Genre/form term', 'repeatable' => false],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'w' => ['label' => 'Control subfield', 'repeatable' => false],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '462' => [
        'label' => 'See from tracing--medium of performance term',
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
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Medium of performance term', 'repeatable' => false],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'w' => ['label' => 'Control subfield', 'repeatable' => false],
        ],
    ],
    '480' => [
        'label' => 'See from tracing--general subdivision',
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
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'w' => ['label' => 'Control subfield', 'repeatable' => false],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '481' => [
        'label' => 'See from tracing--geographic subdivision',
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
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'w' => ['label' => 'Control subfield', 'repeatable' => false],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '482' => [
        'label' => 'See from tracing--chronological subdivision',
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
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'w' => ['label' => 'Control subfield', 'repeatable' => false],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '485' => [
        'label' => 'See from tracing--form subdivision',
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
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'w' => ['label' => 'Control subfield', 'repeatable' => false],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '500' => [
        'label' => 'See also from tracing--personal name',
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
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
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
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'w' => ['label' => 'Control subfield', 'repeatable' => false],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '510' => [
        'label' => 'See also from tracing--corporate name',
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
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
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
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'w' => ['label' => 'Control subfield', 'repeatable' => false],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '511' => [
        'label' => 'See also from tracing--meeting name',
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
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
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
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'w' => ['label' => 'Control subfield', 'repeatable' => false],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '530' => [
        'label' => 'See also from tracing--uniform title',
        'repeatable' => true,
        'indicators' => [
            1 => [
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
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
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
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'w' => ['label' => 'Control subfield', 'repeatable' => false],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '547' => [
        'label' => 'See also from tracing--named event',
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
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Named event', 'repeatable' => false],
            'c' => ['label' => 'Location of named event', 'repeatable' => true],
            'd' => ['label' => 'Date of named event', 'repeatable' => false],
            'g' => ['label' => 'Miscellaneous information', 'repeatable' => true],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'w' => ['label' => 'Control subfield', 'repeatable' => false],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '548' => [
        'label' => 'See also from tracing--chronological term',
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
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Chronological term', 'repeatable' => false],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'w' => ['label' => 'Control subfield', 'repeatable' => false],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '550' => [
        'label' => 'See also from tracing--topical term',
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
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Topical term or geographic name entry element', 'repeatable' => false],
            'b' => ['label' => 'Topical term following geographic name entry element', 'repeatable' => false],
            'g' => ['label' => 'Miscellaneous information', 'repeatable' => true],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'w' => ['label' => 'Control subfield', 'repeatable' => false],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '551' => [
        'label' => 'See also from tracing--geographic name',
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
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Geographic name', 'repeatable' => false],
            'g' => ['label' => 'Miscellaneous information', 'repeatable' => true],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'w' => ['label' => 'Control subfield', 'repeatable' => false],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '555' => [
        'label' => 'See also from tracing--genre/form term',
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
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Genre/form term', 'repeatable' => false],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'w' => ['label' => 'Control subfield', 'repeatable' => false],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '562' => [
        'label' => 'See also from tracing--medium of performance',
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
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Medium of performance term', 'repeatable' => false],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'w' => ['label' => 'Control subfield', 'repeatable' => false],
        ],
    ],
    '580' => [
        'label' => 'See also from tracing--general subdivision',
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
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'w' => ['label' => 'Control subfield', 'repeatable' => false],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '581' => [
        'label' => 'See also from tracing--geographic subdivision',
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
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'w' => ['label' => 'Control subfield', 'repeatable' => false],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '582' => [
        'label' => 'See also from tracing--chronological subdivision',
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
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'w' => ['label' => 'Control subfield', 'repeatable' => false],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '585' => [
        'label' => 'See also from tracing--form subdivision',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Undefined',
                'values' => [
                    ' ' => 'Undefined',
                    '0' => 'Formatted style',
                    '1' => 'Unformatted style',
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
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Dates of publication and/or sequential designation', 'repeatable' => false],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'w' => ['label' => 'Control subfield', 'repeatable' => false],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '641' => [
        'label' => 'Series numbering peculiarities',
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
            'a' => ['label' => 'Numbering peculiarities note', 'repeatable' => false],
            'z' => ['label' => 'Source of information', 'repeatable' => false],
        ],
    ],
    '642' => [
        'label' => 'Series numbering example',
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
            '5' => ['label' => 'Institution/copy to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Series numbering example', 'repeatable' => false],
            'd' => ['label' => 'Volumes/dates to which series numbering example applies', 'repeatable' => false],
        ],
    ],
    '643' => [
        'label' => 'Series place and publisher/issuing body',
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
            'a' => ['label' => 'Place', 'repeatable' => true],
            'b' => ['label' => 'Publisher/issuing body', 'repeatable' => true],
            'd' => ['label' => 'Volumes/dates to which place and publisher/issuing body apply', 'repeatable' => false],
        ],
    ],
    '644' => [
        'label' => 'Series analysis practice',
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
            '5' => ['label' => 'Institution/copy to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Series analysis practice', 'repeatable' => false],
            'b' => ['label' => 'Exceptions to analysis practice', 'repeatable' => false],
            'd' => ['label' => 'Volumes/dates to which analysis practice applies', 'repeatable' => false],
        ],
    ],
    '645' => [
        'label' => 'Series tracing practice',
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
            '5' => ['label' => 'Institution/copy to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Series tracing practice', 'repeatable' => false],
            'd' => ['label' => 'Volumes/dates to which tracing practice applies', 'repeatable' => false],
        ],
    ],
    '646' => [
        'label' => 'Series classification practice',
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
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Series classification practice', 'repeatable' => false],
            'd' => ['label' => 'Volumes/dates to which classification practice applies', 'repeatable' => false],
        ],
    ],
    '663' => [
        'label' => 'Complex see also reference--name',
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
            'a' => ['label' => 'Explanatory text', 'repeatable' => true],
            'b' => ['label' => 'Heading referred to', 'repeatable' => true],
            't' => ['label' => 'Title referred to', 'repeatable' => true],
        ],
    ],
    '664' => [
        'label' => 'Complex see reference--name',
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
            'a' => ['label' => 'Explanatory text', 'repeatable' => true],
            'b' => ['label' => 'Heading referred to', 'repeatable' => true],
            't' => ['label' => 'Title referred to', 'repeatable' => true],
        ],
    ],
    '665' => [
        'label' => 'History reference',
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
            'a' => ['label' => 'History reference', 'repeatable' => true],
        ],
    ],
    '666' => [
        'label' => 'General explanatory reference--name',
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
            'a' => ['label' => 'General explanatory reference', 'repeatable' => true],
        ],
    ],
    '667' => [
        'label' => 'Nonpublic general note',
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
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Nonpublic general note', 'repeatable' => false],
        ],
    ],
    '670' => [
        'label' => 'Source data found',
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
            'a' => ['label' => 'Source citation', 'repeatable' => false],
            'b' => ['label' => 'Information found', 'repeatable' => false],
            'u' => ['label' => 'Uniform Resource Identifier', 'repeatable' => true],
            'w' => ['label' => 'Bibliographic record control number', 'repeatable' => true],
        ],
    ],
    '672' => [
        'label' => 'Title related to the entity',
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
                    '0' => 'No nonfiling characters',
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
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Title', 'repeatable' => false],
            'b' => ['label' => 'Remainder of title', 'repeatable' => false],
            'f' => ['label' => 'Date', 'repeatable' => false],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'w' => ['label' => 'Bibliographic record control number', 'repeatable' => true],
        ],
    ],
    '673' => [
        'label' => 'Title not related to the entity',
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
                    '0' => 'No nonfiling characters',
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
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Title', 'repeatable' => false],
            'b' => ['label' => 'Remainder of title', 'repeatable' => false],
            'f' => ['label' => 'Date', 'repeatable' => false],
            'w' => ['label' => 'Bibliographic record control number', 'repeatable' => true],
        ],
    ],
    '675' => [
        'label' => 'Source data not found',
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
            'a' => ['label' => 'Source citation', 'repeatable' => true],
        ],
    ],
    '677' => [
        'label' => 'Definition',
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
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            'a' => ['label' => 'Definition', 'repeatable' => true],
            'u' => ['label' => 'Uniform Resource Identifier', 'repeatable' => true],
            'v' => ['label' => 'Source of definition', 'repeatable' => false],
        ],
    ],
    '678' => [
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
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Biographical or historical data', 'repeatable' => true],
            'b' => ['label' => 'Expansion', 'repeatable' => false],
            'u' => ['label' => 'Uniform Resource Identifier', 'repeatable' => true],
        ],
    ],
    '680' => [
        'label' => 'Public general note',
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
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Heading or subdivision term', 'repeatable' => true],
            'i' => ['label' => 'Explanatory text', 'repeatable' => true],
        ],
    ],
    '681' => [
        'label' => 'Subject example tracing note',
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
            'a' => ['label' => 'Subject heading or subdivision term', 'repeatable' => true],
            'i' => ['label' => 'Explanatory text', 'repeatable' => true],
        ],
    ],
    '682' => [
        'label' => 'Deleted heading information',
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
            '0' => ['label' => 'Replacement authority record control number', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Replacement heading', 'repeatable' => true],
            'i' => ['label' => 'Explanatory text', 'repeatable' => true],
        ],
    ],
    '688' => [
        'label' => 'Application history note',
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
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Application history note', 'repeatable' => false],
        ],
    ],
    '700' => [
        'label' => 'Established heading linking entry--personal name',
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
                    '0' => 'Library of Congress Subject Headings/Name authority file',
                    '1' => 'Library of Congress Children\'s and Young Adults\' Subject Headings',
                    '2' => 'Medical Subject Headings/NLM name authority file',
                    '3' => 'National Agricultural Library subject authority file',
                    '4' => 'Source not specified',
                    '5' => 'Canadian Subject Headings/LAC name authority file',
                    '6' => 'Répertoire de vedettes-matière',
                    '7' => 'Source specified in subfield $2',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of heading or term', 'repeatable' => false],
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
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
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'w' => ['label' => 'Control subfield', 'repeatable' => false],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '710' => [
        'label' => 'Established heading linking entry--corporate name',
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
                    '0' => 'Library of Congress Subject Headings/Name authority file',
                    '1' => 'Library of Congress Children\'s and Young Adults\' Subject Headings',
                    '2' => 'Medical Subject Headings/NLM name authority file',
                    '3' => 'National Agricultural Library subject authority file',
                    '4' => 'Source not specified',
                    '5' => 'Canadian Subject Headings/LAC name authority file',
                    '6' => 'Répertoire de vedettes-matière',
                    '7' => 'Source specified in subfield $2',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of heading or term', 'repeatable' => false],
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
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
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'w' => ['label' => 'Control subfield', 'repeatable' => false],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '711' => [
        'label' => 'Established heading linking entry--meeting name',
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
                    '0' => 'Library of Congress Subject Headings/Name authority file',
                    '1' => 'Library of Congress Children\'s and Young Adults\' Subject Headings',
                    '2' => 'Medical Subject Headings/NLM name authority file',
                    '3' => 'National Agricultural Library subject authority file',
                    '4' => 'Source not specified',
                    '5' => 'Canadian Subject Headings/LAC name authority file',
                    '6' => 'Répertoire de vedettes-matière',
                    '7' => 'Source specified in subfield $2',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of heading or term', 'repeatable' => false],
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
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
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'w' => ['label' => 'Control subfield', 'repeatable' => false],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '730' => [
        'label' => 'Established heading linking entry--uniform title',
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
                    '0' => 'Library of Congress Subject Headings/Name authority file',
                    '1' => 'Library of Congress Children\'s and Young Adults\' Subject Headings',
                    '2' => 'Medical Subject Headings/NLM name authority file',
                    '3' => 'National Agricultural Library subject authority file',
                    '4' => 'Source not specified',
                    '5' => 'Canadian Subject Headings/LAC name authority file',
                    '6' => 'Répertoire de vedettes-matière',
                    '7' => 'Source specified in subfield $2',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of heading or term', 'repeatable' => false],
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
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
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'w' => ['label' => 'Control subfield', 'repeatable' => false],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '747' => [
        'label' => 'Established heading linking entry--named event',
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
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Named event', 'repeatable' => false],
            'c' => ['label' => 'Location of named event', 'repeatable' => true],
            'd' => ['label' => 'Date of named event', 'repeatable' => false],
            'g' => ['label' => 'Miscellaneous information', 'repeatable' => true],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'w' => ['label' => 'Control subfield', 'repeatable' => false],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '748' => [
        'label' => 'Established heading linking entry--chronological term',
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
                    '0' => 'Library of Congress Subject Headings/Name authority file',
                    '1' => 'Library of Congress Children\'s and Young Adults\' Subject Headings',
                    '2' => 'Medical Subject Headings/NLM name authority file',
                    '3' => 'National Agricultural Library subject authority file',
                    '4' => 'Source not specified',
                    '5' => 'Canadian Subject Headings/LAC name authority file',
                    '6' => 'Répertoire de vedettes-matière',
                    '7' => 'Source specified in subfield $2',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of heading or term', 'repeatable' => false],
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Chronological term', 'repeatable' => false],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'w' => ['label' => 'Control subfield', 'repeatable' => false],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '750' => [
        'label' => 'Established heading linking entry--topical term',
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
                    '0' => 'Library of Congress Subject Headings/Name authority file',
                    '1' => 'Library of Congress Children\'s and Young Adults\' Subject Headings',
                    '2' => 'Medical Subject Headings/NLM name authority file',
                    '3' => 'National Agricultural Library subject authority file',
                    '4' => 'Source not specified',
                    '5' => 'Canadian Subject Headings/LAC name authority file',
                    '6' => 'Répertoire de vedettes-matière',
                    '7' => 'Source specified in subfield $2',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of heading or term', 'repeatable' => false],
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Topical term or geographic name entry element', 'repeatable' => false],
            'b' => ['label' => 'Topical term following geographic name as entry element (NR)      $g - Miscellaneous information', 'repeatable' => true],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'w' => ['label' => 'Control subfield', 'repeatable' => false],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '751' => [
        'label' => 'Established heading linking entry--geographic name',
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
                    '0' => 'Library of Congress Subject Headings/Name authority file',
                    '1' => 'Library of Congress Children\'s and Young Adults\' Subject Headings',
                    '2' => 'Medical Subject Headings/NLM name authority file',
                    '3' => 'National Agricultural Library subject authority file',
                    '4' => 'Source not specified',
                    '5' => 'Canadian Subject Headings/LAC name authority file',
                    '6' => 'Répertoire de vedettes-matière',
                    '7' => 'Source specified in subfield $2',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of heading or term', 'repeatable' => false],
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Geographic name', 'repeatable' => false],
            'g' => ['label' => 'Miscellaneous information', 'repeatable' => true],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'w' => ['label' => 'Control subfield', 'repeatable' => false],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '755' => [
        'label' => 'Established heading linking entry--genre/form term',
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
                    '0' => 'Library of Congress Subject Headings/Name authority file',
                    '1' => 'Library of Congress Children\'s and Young Adults\' Subject Headings',
                    '2' => 'Medical Subject Headings/NLM name authority file',
                    '3' => 'National Agricultural Library subject authority file',
                    '4' => 'Source not specified',
                    '5' => 'Canadian Subject Headings/LAC name authority file',
                    '6' => 'Répertoire de vedettes-matière',
                    '7' => 'Source specified in subfield $2',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of heading or term', 'repeatable' => false],
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Genre/form term as entry element', 'repeatable' => false],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'w' => ['label' => 'Control subfield', 'repeatable' => false],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '762' => [
        'label' => 'Established heading linking entry--medium of performance term',
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
                    '0' => 'Library of Congress Subject Headings/Name authority file',
                    '1' => 'Library of Congress Children\'s and Young Adults\' Subject Headings',
                    '2' => 'Medical Subject Headings/NLM name authority file',
                    '3' => 'National Agricultural Library subject authority file',
                    '4' => 'Source not specified',
                    '5' => 'Canadian Subject Headings/LAC name authority file',
                    '6' => 'Répertoire de vedettes-matière',
                    '7' => 'Source specified in subfield $2',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of heading or term', 'repeatable' => false],
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Medium of performance term as entry element', 'repeatable' => false],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'w' => ['label' => 'Control subfield', 'repeatable' => false],
        ],
    ],
    '780' => [
        'label' => 'Subdivision linking entry--general subdivision',
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
                    '0' => 'Library of Congress Subject Headings/Name authority file',
                    '1' => 'Library of Congress Children\'s and Young Adults\' Subject Headings',
                    '2' => 'Medical Subject Headings/NLM name authority file',
                    '3' => 'National Agricultural Library subject authority file',
                    '4' => 'Source not specified',
                    '5' => 'Canadian Subject Headings/LAC name authority file',
                    '6' => 'Répertoire de vedettes-matière',
                    '7' => 'Source specified in subfield $2',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of heading or term', 'repeatable' => false],
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'w' => ['label' => 'Control subfield', 'repeatable' => false],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '781' => [
        'label' => 'Subdivision linking entry--geographic subdivision',
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
                    '0' => 'Library of Congress Subject Headings/Name authority file',
                    '1' => 'Library of Congress Children\'s and Young Adults\' Subject Headings',
                    '2' => 'Medical Subject Headings/NLM name authority file',
                    '3' => 'National Agricultural Library subject authority file',
                    '4' => 'Source not specified',
                    '5' => 'Canadian Subject Headings/LAC name authority file',
                    '6' => 'Répertoire de vedettes-matière',
                    '7' => 'Source specified in subfield $2',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of heading or term', 'repeatable' => false],
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'w' => ['label' => 'Control subfield', 'repeatable' => false],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '782' => [
        'label' => 'Subdivision linking entry--chronological subdivision',
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
                    '0' => 'Library of Congress Subject Headings/Name authority file',
                    '1' => 'Library of Congress Children\'s and Young Adults\' Subject Headings',
                    '2' => 'Medical Subject Headings/NLM name authority file',
                    '3' => 'National Agricultural Library subject authority file',
                    '4' => 'Source not specified',
                    '5' => 'Canadian Subject Headings/LAC name authority file',
                    '6' => 'Répertoire de vedettes-matière',
                    '7' => 'Source specified in subfield $2',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of heading or term', 'repeatable' => false],
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'w' => ['label' => 'Control subfield', 'repeatable' => false],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '785' => [
        'label' => 'Subdivision linking entry--form subdivision',
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
                    '0' => 'Library of Congress Subject Headings/Name authority file',
                    '1' => 'Library of Congress Children\'s and Young Adults\' Subject Headings',
                    '2' => 'Medical Subject Headings/NLM name authority file',
                    '3' => 'National Agricultural Library subject authority file',
                    '4' => 'Source not specified',
                    '5' => 'Canadian Subject Headings/LAC name authority file',
                    '6' => 'Répertoire de vedettes-matière',
                    '7' => 'Source specified in subfield $2',
                ],
            ],
        ],
        'subfields' => [
            '0' => ['label' => 'Authority record control number or standard number', 'repeatable' => true],
            '1' => ['label' => 'Real World Object URI', 'repeatable' => true],
            '2' => ['label' => 'Source of heading or term', 'repeatable' => false],
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'i' => ['label' => 'Relationship information', 'repeatable' => true],
            'v' => ['label' => 'Form subdivision', 'repeatable' => true],
            'w' => ['label' => 'Control subfield', 'repeatable' => false],
            'x' => ['label' => 'General subdivision', 'repeatable' => true],
            'y' => ['label' => 'Chronological subdivision', 'repeatable' => true],
            'z' => ['label' => 'Geographic subdivision', 'repeatable' => true],
        ],
    ],
    '788' => [
        'label' => 'Complex linking entry data',
        'repeatable' => false,
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
                    '0' => 'Library of Congress Subject Headings/Name authority file',
                    '1' => 'Library of Congress Children\'s and Young Adults\' Subject Headings',
                    '2' => 'Medical Subject Headings/NLM name authority file',
                    '3' => 'National Agricultural Library subject authority file',
                    '4' => 'Source not specified',
                    '5' => 'Canadian Subject Headings/LAC name authority file',
                    '6' => 'Répertoire de vedettes-matière',
                    '7' => 'Source specified in subfield $2',
                ],
            ],
        ],
        'subfields' => [
            '2' => ['label' => 'Source of heading or term', 'repeatable' => false],
            '4' => ['label' => 'Relationship', 'repeatable' => true],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Data provenance', 'repeatable' => true],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Heading referred to', 'repeatable' => true],
            'i' => ['label' => 'Explanatory text', 'repeatable' => true],
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
    '880' => [
        'label' => 'Alternate graphic representation',
        'repeatable' => true,
        'indicators' => [],
        'subfields' => [
            '6' => ['label' => 'Linkage', 'repeatable' => false],
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
