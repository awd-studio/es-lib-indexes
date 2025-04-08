<?php

declare(strict_types=1);

namespace AwdEs\Indexes\Erasing\Criteria;

use AwdEs\Indexes\Erasing\IndexErasingCriteria;
use AwdEs\ValueObject\Id;

final readonly class ByTypeAndIdIndexErasingCriteria implements IndexErasingCriteria
{
    /**
     * @template T
     *
     * @param class-string<\AwdEs\Indexes\Index<T>> $indexType
     */
    public function __construct(
        public string $indexType,
        public Id $entityId,
    ) {}
}
