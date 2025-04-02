<?php

declare(strict_types=1);

namespace AwdEs\Indexes\Meta\Reading;

use AwdEs\Indexes\Meta\IndexMeta;

interface IndexMetaReader
{
    /**
     * @template TIndex of \AwdEs\Indexes\Index
     *
     * @param class-string<TIndex> $entityClass
     *
     * @return IndexMeta<TIndex>
     *
     * @throws \AwdEs\Indexes\Meta\Exception\IndexMetaReadingError
     */
    public function read(string $entityClass): IndexMeta;
}
