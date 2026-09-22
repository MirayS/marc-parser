<?php

declare(strict_types=1);

namespace MirayS\Marc\Tests\Unit;

use MirayS\Marc\Bibliographic\Punctuation;
use PHPUnit\Framework\TestCase;

final class PunctuationTest extends TestCase
{
    public function testStripsIsbdPunctuation(): void
    {
        self::assertSame('Introduction to algorithms', Punctuation::strip('Introduction to algorithms /'));
        self::assertSame('Cambridge', Punctuation::strip('Cambridge :'));
        self::assertSame('The MIT Press', Punctuation::strip('The MIT Press,'));
        self::assertSame('Roman', Punctuation::strip('Roman ;'));
        self::assertSame('525 Seiten', Punctuation::strip('525 Seiten.'));
    }

    public function testKeepsAbbreviationDots(): void
    {
        self::assertSame('2. Aufl.', Punctuation::strip('2. Aufl.'));
        self::assertSame('Cormen, Thomas H.', Punctuation::strip('Cormen, Thomas H.'));
        self::assertSame('3rd ed.', Punctuation::strip('3rd ed.'));
    }

    public function testStripsBrackets(): void
    {
        self::assertSame('2022', Punctuation::stripBrackets('[2022]'));
        self::assertSame('2022', Punctuation::stripBrackets('2022'));
    }
}
