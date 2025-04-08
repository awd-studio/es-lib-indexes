<?php

declare(strict_types=1);

namespace AwdEs\Indexes\Erasing;

use Awd\ValueObject\IDateTime;

final readonly class CasesIndexEraser implements IndexEraser
{
    /**
     * @param iterable<Cases\IndexErasingCriteriaCase> $cases
     */
    public function __construct(
        private iterable $cases,
    ) {}

    #[\Override]
    public function erase(IndexErasingCriteria $criteria, IDateTime $erasedAt): void
    {
        foreach ($this->cases as $case) {
            if (true === $case->handle($criteria, $erasedAt)) {
                return;
            }
        }

        throw new Exception\IndexErasingError(\sprintf('No cases matched for handling index erasing criteria "%s".', $criteria::class));
    }
}
