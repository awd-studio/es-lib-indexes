<?php

declare(strict_types=1);

namespace AwdEs\Indexes;

/**
 * @extends Index<int>
 */
interface IntegerIndex extends Index
{
    public function value(): int;
}
