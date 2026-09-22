<?php

declare(strict_types=1);

namespace MirayS\Marc\Tests\Unit;

use MirayS\Marc\Bibliographic\Isbn;
use PHPUnit\Framework\TestCase;

final class IsbnTest extends TestCase
{
    public function testNormalizesIsbn13(): void
    {
        self::assertSame('9783423148665', Isbn::normalize('9783423148665'));
        self::assertSame('9783423148665', Isbn::normalize('978-3-423-14866-5'));
        self::assertSame('9783423148665', Isbn::normalize('9783423148665 : Broschur'));
    }

    public function testConvertsIsbn10(): void
    {
        self::assertSame('9780262046305', Isbn::toIsbn13('0262046305'));
        self::assertSame('9780306406157', Isbn::normalize('0-306-40615-2'));
        self::assertSame('9780439358064', Isbn::normalize('0-439-35806-X'));
    }

    public function testRejectsBrokenChecksums(): void
    {
        self::assertNull(Isbn::normalize('9783423148666'));
        self::assertNull(Isbn::normalize('0306406153'));
        self::assertNull(Isbn::normalize('not an isbn'));
        self::assertNull(Isbn::normalize(''));
    }

    public function testValidators(): void
    {
        self::assertTrue(Isbn::isValid13('9783423148665'));
        self::assertFalse(Isbn::isValid13('978342314866'));
        self::assertTrue(Isbn::isValid10('043935806X'));
        self::assertFalse(Isbn::isValid10('0439358060'));
    }
}
