<?php

declare(strict_types=1);

namespace AwdEs\Indexes\Erasing\Criteria;

use AwdEs\Indexes\Erasing\IndexErasingCriteria;
use AwdEs\ValueObject\Id;

final readonly class ByIdIndexErasingCriteria implements IndexErasingCriteria
{
    public function __construct(
        public Id $entityId,
    ) {}
}
