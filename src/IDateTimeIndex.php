<?php

declare(strict_types=1);

namespace AwdEs\Indexes;

use Awd\ValueObject\IDateTime;

/**
 * @extends Index<\Awd\ValueObject\IDateTime>
 */
interface IDateTimeIndex extends Index
{
    public function value(): IDateTime;
}
