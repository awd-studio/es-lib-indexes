<?php

declare(strict_types=1);

namespace AwdEs\Indexes;

/**
 * @extends Index<bool>
 */
interface BooleanIndex extends Index
{
    public function value(): bool;
}
