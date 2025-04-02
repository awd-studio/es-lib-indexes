<?php

declare(strict_types=1);

namespace AwdEs\Indexes\Attribute;

use AwdEs\Attribute\AwdEsAttribute;

#[\Attribute(\Attribute::TARGET_CLASS)]
final readonly class AsIndex implements AwdEsAttribute
{
    /**
     * @param string                                       $name    a unique ID of an entity in the system
     * @param class-string<\AwdEs\Aggregate\AggregateRoot> $rootFqn the aggregate class' fqcn
     */
    public function __construct(
        public string $name,
        public string $rootFqn,
    ) {}
}
