<?php

declare(strict_types=1);

namespace AwdEs\Indexes\ValueObject;

use AwdEs\ValueObject\Id;

/**
 * @extends \IteratorAggregate<\AwdEs\ValueObject\Id>
 */
interface IdCollection extends \IteratorAggregate, \Countable
{
    public function append(Id $id): static;

    public function has(Id $id): bool;

    public function isEmpty(): bool;

    public function diff(self $other): self;

    /** @return \Generator<string, Id, void, void> */
    public function getIterator(): \Generator;
}
