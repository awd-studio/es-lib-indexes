<?php

declare(strict_types=1);

namespace AwdEs\Indexes;

/**
 * @extends Index<string>
 */
interface StringIndex extends Index
{
    public function value(): string;
}
