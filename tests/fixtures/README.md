# Fixtures

- `dnb-sru.xml`, `dnb-oai.xml`, `dnb-reihe-n.xml` — responses captured from the Deutsche
  Nationalbibliothek (SRU and OAI-PMH, MARC21plus-1-xml); DNB title data is CC0.
- `loc-sru.xml` — one record from the Library of Congress SRU gateway, public domain.
- `loc.mrc`, `loc.ndjson`, `dnb.mrc`, `dnb.mrc.gz` — the same records written by pymarc, so the
  readers are tested against a foreign implementation rather than our own writers.
- `marc8.mrc` — twenty MARC-8 records; `marc8-decoded.ndjson` is pymarc's transcoding of them.
- `marc8-corpus.marc8.txt` / `marc8-corpus.utf8.txt` — 1514 paired MARC-8 and UTF-8 strings from
  the ruby-marc test suite (MIT, Copyright Ed Summers, Kevin Clarke, Will Groppe), covering
  Latin diacritics, Greek, Cyrillic, Hebrew, Arabic and EACC.
