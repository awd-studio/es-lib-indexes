<?php

declare(strict_types=1);

namespace AwdEs\Indexes\Erasing\Criteria;

use AwdEs\Indexes\Erasing\IndexErasingCriteria;

final readonly class ByTypeAndValueIndexErasingCriteria implements IndexErasingCriteria
{
    /**
     * @template T
     *
     * @param class-string<\AwdEs\Indexes\Index<T>> $indexType
     * @param T                                     $value
     */
    public function __construct(
        public string $indexType,
        public mixed $value,
    ) {}
}
