<?php

declare(strict_types=1);

namespace MirayS\Marc\CodeList;

final class HoldingsFields
{
    public const FORMAT = 'MARC 21 Holdings';

    public const SOURCE = 'https://www.loc.gov/marc/holdings/echdlist.html';

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
    '004' => [
        'label' => 'Control number for related bibliographic record',
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
    '007' => [
        'label' => 'Physical description fixed field--general information',
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
            'b' => ['label' => 'NUCMC control number', 'repeatable' => true],
            'z' => ['label' => 'Canceled or invalid LC control number', 'repeatable' => true],
        ],
    ],
    '014' => [
        'label' => 'Linkage number',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Type of linkage number',
                'values' => [
                    '0' => 'Holdings record number',
                    '1' => 'Bibliographic record number',
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
            'a' => ['label' => 'Linkage number', 'repeatable' => false],
            'b' => ['label' => 'Source of number', 'repeatable' => false],
            'z' => ['label' => 'Canceled or invalid linkage number', 'repeatable' => true],
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
            'z' => ['label' => 'Canceled or invalid control number', 'repeatable' => true],
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
        'subfields' => [],
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
            'a' => ['label' => 'Standard Technical Report Number', 'repeatable' => false],
            'q' => ['label' => 'Qualifying information', 'repeatable' => true],
            'z' => ['label' => 'Canceled/invalid STRN', 'repeatable' => true],
        ],
    ],
    '030' => [
        'label' => 'Coden designation',
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
            'a' => ['label' => 'CODEN', 'repeatable' => false],
            'z' => ['label' => 'Canceled/invalid CODEN', 'repeatable' => true],
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
            'z' => ['label' => 'Canceled or invalid control number', 'repeatable' => true],
        ],
    ],
    '040' => [
        'label' => 'Record source',
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
            'q' => ['label' => 'Supplying agency', 'repeatable' => false],
            'u' => ['label' => 'Uniform Resource Identifier', 'repeatable' => true],
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
            '3' => ['label' => 'Material specified', 'repeatable' => false],
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'System details note', 'repeatable' => false],
            'i' => ['label' => 'Display text', 'repeatable' => false],
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
            '6' => ['label' => 'Linkage', 'repeatable' => false],
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
    '841' => [
        'label' => 'Holdings coded data values',
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
    '843' => [
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
            '5' => ['label' => 'Institution to which field applies', 'repeatable' => true],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '7' => ['label' => 'Fixed-length data elements of reproduction', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Type of reproduction', 'repeatable' => false],
            'b' => ['label' => 'Place of reproduction', 'repeatable' => true],
            'c' => ['label' => 'Agency responsible for reproduction', 'repeatable' => true],
            'd' => ['label' => 'Date of reproduction', 'repeatable' => false],
            'e' => ['label' => 'Physical description of reproduction', 'repeatable' => false],
            'f' => ['label' => 'Series statement of reproduction', 'repeatable' => true],
            'm' => ['label' => 'Dates of publication and/or sequential designation of issues reproduced', 'repeatable' => true],
            'n' => ['label' => 'Note about reproduction', 'repeatable' => true],
        ],
    ],
    '844' => [
        'label' => 'Name of unit',
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
    '845' => [
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
        'indicators' => [
            1 => [
                'label' => 'Compressibility and expandability',
                'values' => [
                    '0' => 'Cannot compress or expand',
                    '1' => 'Can compress but not expand',
                    '2' => 'Can compress or expand',
                    '3' => 'Unknown',
                ],
            ],
            2 => [
                'label' => 'Caption evaluation',
                'values' => [
                    '0' => 'Captions verified; all levels present',
                    '1' => 'Captions verified; all levels may not be present',
                    '2' => 'Captions unverified; all levels present',
                    '3' => 'Captions unverified; all levels may not be present',
                ],
            ],
        ],
        'subfields' => [
            '2' => ['label' => 'Source of caption abbreviation', 'repeatable' => true],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
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
            'n' => ['label' => 'Pattern note', 'repeatable' => false],
            'o' => ['label' => 'Type of unit', 'repeatable' => true],
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
        'indicators' => [
            1 => [
                'label' => 'Compressibility and expandability',
                'values' => [
                    '0' => 'Cannot compress or expand',
                    '1' => 'Can compress but not expand',
                    '2' => 'Can compress or expand',
                    '3' => 'Unknown',
                ],
            ],
            2 => [
                'label' => 'Caption evaluation',
                'values' => [
                    '0' => 'Captions verified; all levels present',
                    '1' => 'Captions verified; all levels may not be present',
                    '2' => 'Captions unverified; all levels present',
                    '3' => 'Captions unverified; all levels may not be present',
                ],
            ],
        ],
        'subfields' => [
            '2' => ['label' => 'Source of caption abbreviation', 'repeatable' => true],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
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
            'n' => ['label' => 'Pattern note', 'repeatable' => false],
            'o' => ['label' => 'Type of unit', 'repeatable' => true],
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
            'n' => ['label' => 'Pattern note', 'repeatable' => false],
            'o' => ['label' => 'Type of unit', 'repeatable' => true],
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
        'indicators' => [
            1 => [
                'label' => 'Field encoding level',
                'values' => [
                    ' ' => 'No information provided',
                    '3' => 'Holdings level 3',
                    '4' => 'Holdings level 4',
                    '5' => 'Holdings level 4 with piece designation',
                ],
            ],
            2 => [
                'label' => 'Form of holdings',
                'values' => [
                    ' ' => 'No information provided',
                    '0' => 'Compressed',
                    '1' => 'Uncompressed',
                    '2' => 'Compressed, use textual display',
                    '3' => 'Uncompressed, use textual display',
                    '4' => 'Item(s) not published',
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
            'n' => ['label' => 'Converted Gregorian year', 'repeatable' => false],
            'o' => ['label' => 'Title of unit', 'repeatable' => true],
            'p' => ['label' => 'Piece designation', 'repeatable' => false],
            'q' => ['label' => 'Piece physical condition', 'repeatable' => false],
            's' => ['label' => 'Copyright article-fee code', 'repeatable' => true],
            't' => ['label' => 'Copy number', 'repeatable' => false],
            'w' => ['label' => 'Break indicator', 'repeatable' => false],
            'x' => ['label' => 'Nonpublic note', 'repeatable' => true],
            'z' => ['label' => 'Public note', 'repeatable' => true],
        ],
    ],
    '864' => [
        'label' => 'Enumeration and chronology--supplementary material',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Field encoding level',
                'values' => [
                    ' ' => 'No information provided',
                    '3' => 'Holdings level 3',
                    '4' => 'Holdings level 4',
                    '5' => 'Holdings level 4 with piece designation',
                ],
            ],
            2 => [
                'label' => 'Form of holdings',
                'values' => [
                    ' ' => 'No information provided',
                    '0' => 'Compressed',
                    '1' => 'Uncompressed',
                    '2' => 'Compressed, use textual display',
                    '3' => 'Uncompressed, use textual display',
                    '4' => 'Item(s) not published',
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
            'n' => ['label' => 'Converted Gregorian year', 'repeatable' => false],
            'o' => ['label' => 'Title of unit', 'repeatable' => true],
            'p' => ['label' => 'Piece designation', 'repeatable' => false],
            'q' => ['label' => 'Piece physical condition', 'repeatable' => false],
            's' => ['label' => 'Copyright article-fee code', 'repeatable' => true],
            't' => ['label' => 'Copy number', 'repeatable' => false],
            'w' => ['label' => 'Break indicator', 'repeatable' => false],
            'x' => ['label' => 'Nonpublic note', 'repeatable' => true],
            'z' => ['label' => 'Public note', 'repeatable' => true],
        ],
    ],
    '865' => [
        'label' => 'Enumeration and chronology--indexes',
        'repeatable' => true,
        'indicators' => [
            1 => [
                'label' => 'Field encoding level',
                'values' => [
                    ' ' => 'No information provided',
                    '3' => 'Holdings level 3',
                    '4' => 'Holdings level 4',
                    '5' => 'Holdings level 4 with piece designation',
                ],
            ],
            2 => [
                'label' => 'Form of holdings',
                'values' => [
                    ' ' => 'No information provided',
                    '0' => 'Compressed',
                    '1' => 'Uncompressed',
                    '2' => 'Compressed, use textual display',
                    '3' => 'Uncompressed, use textual display',
                    '4' => 'Item(s) not published',
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
            'n' => ['label' => 'Converted Gregorian year', 'repeatable' => false],
            'o' => ['label' => 'Title of unit', 'repeatable' => true],
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
        'indicators' => [
            1 => [
                'label' => 'Field encoding level',
                'values' => [
                    ' ' => 'No information provided',
                    '3' => 'Holdings level 3',
                    '4' => 'Holdings level 4',
                    '5' => 'Holdings level 4 with piece designation',
                ],
            ],
            2 => [
                'label' => 'Type of notation',
                'values' => [
                    '0' => 'Non-standard',
                    '1' => 'ANSI/NISO Z39.71 or ISO 10324',
                    '2' => 'ANSI Z39.42',
                    '7' => 'Source specified in subfield $2',
                ],
            ],
        ],
        'subfields' => [
            '2' => ['label' => 'Source of notation', 'repeatable' => false],
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
        'indicators' => [
            1 => [
                'label' => 'Field encoding level',
                'values' => [
                    ' ' => 'No information provided',
                    '3' => 'Holdings level 3',
                    '4' => 'Holdings level 4',
                    '5' => 'Holdings level 4 with piece designation',
                ],
            ],
            2 => [
                'label' => 'Type of notation',
                'values' => [
                    '0' => 'Non-standard',
                    '1' => 'ANSI/NISO Z39.71 or ISO 10324',
                    '2' => 'ANSI Z39.42',
                    '7' => 'Source specified in subfield $2',
                ],
            ],
        ],
        'subfields' => [
            '2' => ['label' => 'Source of notation', 'repeatable' => false],
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
        'indicators' => [
            1 => [
                'label' => 'Field encoding level',
                'values' => [
                    ' ' => 'No information provided',
                    '3' => 'Holdings level 3',
                    '4' => 'Holdings level 4',
                    '5' => 'Holdings level 4 with piece designation',
                ],
            ],
            2 => [
                'label' => 'Type of notation',
                'values' => [
                    '0' => 'Non-standard',
                    '1' => 'ANSI/NISO Z39.71 or ISO 10324',
                    '2' => 'ANSI Z39.42',
                    '7' => 'Source specified in subfield $2',
                    ' ' => 'Undefined',
                ],
            ],
        ],
        'subfields' => [
            '2' => ['label' => 'Source of notation', 'repeatable' => false],
            '3' => ['label' => 'Materials specified', 'repeatable' => false],
            '6' => ['label' => 'Linkage', 'repeatable' => false],
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => true],
            'a' => ['label' => 'Textual string', 'repeatable' => false],
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
    '876' => [
        'label' => 'Item information--basic bibliographic unit',
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
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => false],
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
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => false],
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
            '8' => ['label' => 'Field link and sequence number', 'repeatable' => false],
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
