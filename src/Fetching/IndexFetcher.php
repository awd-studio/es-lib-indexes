<?php

declare(strict_types=1);

namespace AwdEs\Indexes\Fetching;

use AwdEs\Indexes\Retrieving\IndexQuery;
use AwdEs\Indexes\ValueObject\IdCollection;

interface IndexFetcher
{
    public function fetch(IndexQuery $query): IdCollection;
}
