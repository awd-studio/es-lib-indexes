<?php

declare(strict_types=1);

namespace AwdEs\Indexes\Meta\Registry;

interface IndexRegistry
{
    /**
     * @param class-string<\AwdEs\Indexes\Index> $indexFqn
     */
    public function register(string $indexFqn): void;  // @phpstan-ignore missingType.generics

    /**
     * @return class-string<\AwdEs\Indexes\Index>
     *
     * @throws Exception\UnknownIndexName
     */
    public function indexFqnFor(string $indexName): string;  // @phpstan-ignore missingType.generics
}
