<?php

declare(strict_types=1);

namespace MirayS\Marc\Bibliographic;

final class Contributor
{
    /**
     * @param list<string> $relatorCodes
     * @param list<string> $relatorTerms
     * @param list<string> $identifiers
     */
    public function __construct(
        public readonly string $name,
        public readonly string $tag,
        public readonly array $relatorCodes = [],
        public readonly array $relatorTerms = [],
        public readonly ?string $dates = null,
        public readonly array $identifiers = [],
    ) {
    }

    public function isPersonal(): bool
    {
        return in_array($this->tag, ['100', '700'], true);
    }

    public function isCorporate(): bool
    {
        return in_array($this->tag, ['110', '710'], true);
    }

    public function isMeeting(): bool
    {
        return in_array($this->tag, ['111', '711'], true);
    }

    public function isMain(): bool
    {
        return str_starts_with($this->tag, '1');
    }

    public function hasRelator(string ...$codes): bool
    {
        return array_intersect($codes, $this->relatorCodes) !== [];
    }

    public function isAuthor(): bool
    {
        if ($this->hasRelator('aut', 'cre')) {
            return true;
        }

        if ($this->relatorCodes !== []) {
            return false;
        }

        foreach ($this->relatorTerms as $term) {
            if (preg_match('/^(author|verfasser|auteur|autor|creator)/iu', trim($term)) === 1) {
                return true;
            }
        }

        return $this->relatorTerms === [] && $this->isMain();
    }
}
