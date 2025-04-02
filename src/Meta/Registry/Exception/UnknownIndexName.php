<?php

declare(strict_types=1);

namespace AwdEs\Indexes\Meta\Registry\Exception;

use AwdEs\Exception\NotFoundException;

final class UnknownIndexName extends NotFoundException
{
    public function __construct(string $indexName, ?\Throwable $previous = null)
    {
        $message = \sprintf('Unknown index with name: "%s".', $indexName);

        parent::__construct($message, 0, $previous);
    }
}
