<?php

declare(strict_types=1);

namespace AwdEs\Indexes\Erasing;

use Awd\ValueObject\IDateTime;

interface IndexEraser
{
    /**
     * @throws Exception\IndexErasingError
     */
    public function erase(IndexErasingCriteria $criteria, IDateTime $erasedAt): void;
}
