<?php

declare(strict_types=1);

namespace AwdEs\Fetching;

use AwdEs\Retrieving\IndexQuery;
use AwdEs\ValueObject\IdCollection;

interface IndexFetcher
{
    public function fetch(IndexQuery $query): IdCollection;
}
