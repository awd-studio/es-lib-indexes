<?php

declare(strict_types=1);

namespace AwdEs\Indexes;

use AwdEs\ValueObject\Id;

/**
 * @template T
 */
interface Index
{
    public function aggregateId(): Id;

    /**
     * @return T
     */
    public function value(): mixed;
}
