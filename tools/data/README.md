# Generator input

`marc8-mapping.json` — MARC-8 to Unicode code tables, one entry per code point with the
combining flag, for the twelve code sets of the standard (Basic and Extended Latin, Basic and
Extended Arabic, Basic and Extended Cyrillic, Basic Greek, Greek symbols, Basic Hebrew,
subscripts, superscripts and EACC). The data comes from the Library of Congress MARC-8 code
tables, which are in the public domain; this copy was taken from pymarc's transcription of them
(BSD-2-Clause, Copyright Ed Summers) because www.loc.gov no longer serves `codetables.xml` to
scripted clients. `tools/generate-marc8-tables.php` turns it into `src/CodeList/Marc8/*.php`.

`marc21-supplement.json` — field and subfield definitions of MARC 21 Bibliographic through
Update No. 34 (July 2022) that the scraped primary source was missing, chiefly the embedded
holdings block (841-845, 853-855, 863-868, 876-878). Names are the standard's own, cross-checked
against the Koha MARC 21 default framework. `tools/generate-codelists.php` merges it into
`src/CodeList/Fields.php`.
