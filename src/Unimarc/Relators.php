<?php

declare(strict_types=1);

namespace MirayS\Marc\Unimarc;

final class Relators
{
    /**
     * @var array<int|string, array{0: string, 1: string}>
     */
    public const CODES = [
        '005' => ['act', 'Actor'],
        '010' => ['adp', 'Adapter'],
        '018' => ['anm', 'Animator'],
        '020' => ['ann', 'Annotator'],
        '030' => ['arr', 'Arranger'],
        '040' => ['art', 'Artist'],
        '050' => ['asg', 'Assignee'],
        '060' => ['asn', 'Associated name'],
        '065' => ['auc', 'Auctioneer'],
        '070' => ['aut', 'Author'],
        '072' => ['aqt', 'Author in quotations or text extracts'],
        '075' => ['aft', 'Author of afterword, postface, colophon, etc.'],
        '080' => ['aui', 'Author of introduction, etc.'],
        '090' => ['aud', 'Author of dialogue'],
        '100' => ['ant', 'Bibliographic antecedent'],
        '110' => ['bnd', 'Binder'],
        '120' => ['bdd', 'Binding designer'],
        '130' => ['bkd', 'Book designer'],
        '140' => ['bjd', 'Bookjacket designer'],
        '150' => ['bpd', 'Bookplate designer'],
        '160' => ['bsl', 'Bookseller'],
        '170' => ['cll', 'Calligrapher'],
        '180' => ['ctg', 'Cartographer'],
        '190' => ['cns', 'Censor'],
        '200' => ['chr', 'Choreographer'],
        '205' => ['clb', 'Collaborator'],
        '210' => ['cmm', 'Commentator'],
        '212' => ['cwt', 'Commentator for written text'],
        '220' => ['com', 'Compiler'],
        '230' => ['cmp', 'Composer'],
        '240' => ['cmt', 'Compositor'],
        '245' => ['ccp', 'Conceptor'],
        '250' => ['cnd', 'Conductor'],
        '255' => ['csp', 'Consultant to a project'],
        '260' => ['cph', 'Copyright holder'],
        '270' => ['crr', 'Corrector'],
        '273' => ['cur', 'Curator'],
        '275' => ['dnc', 'Dancer'],
        '280' => ['dte', 'Dedicatee'],
        '290' => ['dto', 'Dedicator'],
        '295' => ['dgg', 'Degree granting institution'],
        '300' => ['drt', 'Director'],
        '305' => ['dis', 'Dissertant'],
        '310' => ['dst', 'Distributor'],
        '320' => ['dnr', 'Donor'],
        '330' => ['dub', 'Dubious author'],
        '340' => ['edt', 'Editor'],
        '350' => ['egr', 'Engraver'],
        '360' => ['etr', 'Etcher'],
        '365' => ['exp', 'Expert'],
        '370' => ['flm', 'Film editor'],
        '380' => ['frg', 'Forger'],
        '390' => ['fmo', 'Former owner'],
        '400' => ['fnd', 'Funder'],
        '410' => ['grt', 'Graphic technician'],
        '420' => ['hnr', 'Honoree'],
        '430' => ['ilu', 'Illuminator'],
        '440' => ['ill', 'Illustrator'],
        '450' => ['ins', 'Inscriber'],
        '460' => ['ive', 'Interviewee'],
        '470' => ['ivr', 'Interviewer'],
        '475' => ['isb', 'Issuing body'],
        '480' => ['lbt', 'Librettist'],
        '490' => ['lse', 'Licensee'],
        '500' => ['lso', 'Licensor'],
        '510' => ['ltg', 'Lithographer'],
        '520' => ['lyr', 'Lyricist'],
        '530' => ['mte', 'Metal-engraver'],
        '540' => ['mon', 'Monitor'],
        '550' => ['nrt', 'Narrator'],
        '555' => ['opn', 'Opponent'],
        '557' => ['orm', 'Organizer'],
        '560' => ['org', 'Originator'],
        '570' => ['oth', 'Other'],
        '580' => ['ppm', 'Papermaker'],
        '582' => ['pta', 'Patent applicant'],
        '584' => ['inv', 'Inventor'],
        '587' => ['pth', 'Patent holder'],
        '590' => ['prf', 'Performer'],
        '600' => ['pht', 'Photographer'],
        '605' => ['pre', 'Presenter'],
        '610' => ['prt', 'Printer'],
        '620' => ['pop', 'Printer of plates'],
        '630' => ['pro', 'Producer'],
        '633' => ['prd', 'Production personnel'],
        '635' => ['prg', 'Programmer'],
        '637' => ['pmn', 'Project manager'],
        '640' => ['pfr', 'Proofreader'],
        '650' => ['pbl', 'Publisher'],
        '651' => ['pbd', 'Publishing director'],
        '660' => ['rcp', 'Addressee'],
        '670' => ['rce', 'Recording engineer'],
        '673' => ['rth', 'Research team head'],
        '675' => ['rev', 'Reviewer'],
        '677' => ['rtm', 'Research team member'],
        '680' => ['rbr', 'Rubricator'],
        '690' => ['aus', 'Screenwriter'],
        '695' => ['sad', 'Scientific advisor'],
        '700' => ['scr', 'Scribe'],
        '705' => ['scl', 'Sculptor'],
        '710' => ['sec', 'Secretary'],
        '720' => ['sgn', 'Signer'],
        '721' => ['sng', 'Singer'],
        '723' => ['spn', 'Sponsor'],
        '725' => ['stn', 'Standards body'],
        '727' => ['ths', 'Thesis advisor'],
        '730' => ['trl', 'Translator'],
        '740' => ['tyd', 'Type designer'],
        '750' => ['tyg', 'Typographer'],
        '755' => ['voc', 'Vocalist'],
        '760' => ['wde', 'Wood engraver'],
        '770' => ['wam', 'Writer of accompanying material'],
    ];

    public static function marcCode(string $code): ?string
    {
        return self::CODES[self::normalize($code)][0] ?? null;
    }

    public static function term(string $code): ?string
    {
        return self::CODES[self::normalize($code)][1] ?? null;
    }

    private static function normalize(string $code): string
    {
        $code = trim($code);

        return ctype_digit($code) ? str_pad($code, 3, '0', STR_PAD_LEFT) : strtolower($code);
    }
}
