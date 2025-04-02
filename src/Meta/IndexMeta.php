<?php

declare(strict_types=1);

namespace AwdEs\Indexes\Meta;

use AwdEs\Meta\ClassMeta;

/**
 * @template TIndex of \AwdEs\Indexes\Index
 *
 * @implements \AwdEs\Meta\ClassMeta<TIndex>
 */
final readonly class IndexMeta implements ClassMeta
{
    /**
     * @param class-string<TIndex>                  $fqn
     * @param class-string<\AwdEs\Aggregate\Entity> $entityFqn
     */
    public function __construct(
        public string $name,
        public string $fqn,
        public string $entityFqn,
    ) {}
}
