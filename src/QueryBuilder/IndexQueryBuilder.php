<?php

declare(strict_types=1);

namespace AwdEs\Indexes\QueryBuilder;

final readonly class IndexQueryBuilder
{
    /**
     * @template T
     *
     * @param class-string<\AwdEs\Indexes\Index<T>> $indexName
     */
    public function __construct(
        public string $indexName,
    ) {}
}
