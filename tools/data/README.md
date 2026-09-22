# Generator input

`codetables.xml` — the Library of Congress MARC-8 code tables (public domain), covering all
twelve code sets of the standard: Basic and Extended Latin, Greek symbols, subscripts,
superscripts, Basic Hebrew, Basic and Extended Cyrillic, Basic and Extended Arabic, Basic Greek
and the 15 739 East Asian ideographs of EACC. `tools/generate-marc8-tables.php` turns it into
`src/CodeList/Marc8/*.php`. Where the tables give no Unicode equivalent — the second half of a
double diacritic, whose first half maps to the single combining character — the decoder consumes
the byte and emits nothing.

`ecbdlist.html` — the Library of Congress concise list of MARC 21 Bibliographic fields, with
every field, indicator value and subfield and their repeatability. `tools/generate-fields.php`
parses it into `src/CodeList/Fields.php`, skipping everything marked `[OBSOLETE]`.

`ecadlist.html` and `echdlist.html` — the same concise lists for MARC 21 Authority and MARC 21
Holdings, parsed by the same generator into `src/CodeList/AuthorityFields.php` and
`src/CodeList/HoldingsFields.php`.

`marc21-supplement.json` — what the bibliographic list does not carry: the embedded holdings
block (841-845, 853-855, 863-868, 876-878), whose subfields are defined in the MARC 21 Holdings
format, the superseded but still widespread 440, and a handful of subfields added after that
page was written. Cross-checked against the Koha MARC 21 framework, which tracks Update No. 34
(July 2022). `tools/generate-fields.php` merges it in.
