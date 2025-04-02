<?php

declare(strict_types=1);

namespace AwdEs\Indexes\Tests\Unit\Meta\Registry;

use AwdEs\Indexes\Meta\IndexMeta;
use AwdEs\Indexes\Meta\Reading\IndexMetaReader;
use AwdEs\Indexes\Meta\Registry\Exception\UnknownIndexName;
use AwdEs\Indexes\Meta\Registry\InMemoryIndexRegistry;
use AwdEs\Indexes\Tests\Shared\AppTestCase;
use Prophecy\Prophecy\ObjectProphecy;

use function PHPUnit\Framework\assertSame;

/**
 * @coversDefaultClass \AwdEs\Indexes\Meta\Registry\InMemoryIndexRegistry
 *
 * @internal
 */
final class InMemoryIndexRegistryTest extends AppTestCase
{
    private InMemoryIndexRegistry $instance;
    private IndexMetaReader|ObjectProphecy $reader;

    #[\Override]
    protected function setUp(): void
    {
        parent::setUp();

        $this->reader = $this->prophesize(IndexMetaReader::class);
        $this->instance = new InMemoryIndexRegistry($this->reader->reveal());
    }

    public function testMustRegisterIndex(): void
    {
        $indexFqn = 'Namespace\IndexClass';
        $indexId = 'example_index';

        $meta = new IndexMeta($indexId, $indexFqn, $indexFqn);

        $this->reader
            ->read($indexFqn)
            ->willReturn($meta)
            ->shouldBeCalledOnce()
        ;

        $this->instance->register($indexFqn);
    }

    public function testMustRetrieveRegisteredIndex(): void
    {
        $indexFqn = 'Namespace\IndexClass';
        $indexId = 'example_index';

        $meta = new IndexMeta($indexId, $indexFqn, $indexFqn);

        $this->reader
            ->read($indexFqn)
            ->willReturn($meta)
        ;

        $this->instance->register($indexFqn);

        $retrievedIndexFqn = $this->instance->indexFqnFor($indexId);

        assertSame($indexFqn, $retrievedIndexFqn);
    }

    public function testMustOverwriteExistingIndex(): void
    {
        $indexFqn1 = 'Namespace\IndexClass1';
        $indexFqn2 = 'Namespace\IndexClass2';
        $indexId = 'example_index';

        $meta1 = new IndexMeta($indexId, $indexFqn1, $indexFqn1);
        $meta2 = new IndexMeta($indexId, $indexFqn1, $indexFqn1);

        $this->reader->read($indexFqn1)->willReturn($meta1);
        $this->reader->read($indexFqn2)->willReturn($meta2);

        $this->instance = new InMemoryIndexRegistry($this->reader->reveal());

        $this->instance->register($indexFqn1);
        $this->instance->register($indexFqn2);

        assertSame(
            $indexFqn2,
            $this->instance->indexFqnFor($indexId),
            'Registering the same index name multiple times should overwrite the previous value.',
        );
    }

    public function testMustThrowExceptionForUnknownIndex(): void
    {
        $unknownIndex = 'unknown_index';

        $this->expectException(UnknownIndexName::class);

        $this->instance->indexFqnFor($unknownIndex);
    }
}
