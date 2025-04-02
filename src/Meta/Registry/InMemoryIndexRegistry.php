<?php

declare(strict_types=1);

namespace AwdEs\Indexes\Meta\Registry;

use AwdEs\Indexes\Meta\Reading\IndexMetaReader;

final class InMemoryIndexRegistry implements IndexRegistry
{
    /** @var array<string, class-string<\AwdEs\Indexes\Index>> */
    private array $registry = []; // @phpstan-ignore missingType.generics

    public function __construct(
        private readonly IndexMetaReader $reader,
    ) {}

    #[\Override] // @phpstan-ignore missingType.generics
    public function register(string $indexFqn): void
    {
        $meta = $this->reader->read($indexFqn);
        $this->registry[$meta->id] = $indexFqn;
    }

    #[\Override] // @phpstan-ignore missingType.generics
    public function indexFqnFor(string $indexName): string
    {
        return $this->registry[$indexName] ?? throw new Exception\UnknownIndexName($indexName);
    }
}
