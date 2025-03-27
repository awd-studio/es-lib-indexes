<?php

declare(strict_types=1);

namespace AwdEs\Erasing;

use Awd\ValueObject\IDateTime;
use AwdEs\Indexes\Index;

interface IndexEraser
{
    /**
     * @template T
     *
     * @param Index<T> $index
     *
     * @throws Exception\IndexErasingError
     */
    public function erase(Index $index, IDateTime $erasedAt): void;
}
