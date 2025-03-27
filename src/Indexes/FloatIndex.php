<?php

declare(strict_types=1);

namespace AwdEs\Indexes;

/**
 * @extends Index<float>
 */
interface FloatIndex extends Index
{
    public function value(): float;
}
