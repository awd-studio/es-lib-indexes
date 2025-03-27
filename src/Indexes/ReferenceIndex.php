<?php

declare(strict_types=1);

namespace AwdEs\Indexes;

use AwdEs\ValueObject\Id;

/**
 * @extends Index<Id>
 */
interface ReferenceIndex extends Index
{
    public function value(): Id;
}
