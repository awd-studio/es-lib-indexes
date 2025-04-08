<?php

declare(strict_types=1);

namespace AwdEs\Indexes\Tests\Unit\Attribute\Meta\Reading;

use AwdEs\Attribute\Reading\AwdEsClassAttributeReader;
use AwdEs\Indexes\Attribute\AsIndex;
use AwdEs\Indexes\Attribute\Meta\Reading\AttributeIndexMetaReader;
use AwdEs\Indexes\Meta\IndexMeta;
use AwdEs\Indexes\Tests\Shared\AppTestCase;

use function PHPUnit\Framework\assertInstanceOf;
use function PHPUnit\Framework\assertSame;

/**
 * @coversDefaultClass \AwdEs\Indexes\Attribute\Meta\Reading\AttributeIndexMetaReader
 *
 * @internal
 */
final class AttributeIndexMetaReaderTest extends AppTestCase
{
    public function testReadMustReturnCorrectIndexMeta(): void
    {
        // Input data
        $entityClass = 'SomeEntityClass';

        $realAsIndex = new AsIndex(
            name: 'index_name',
            entityFqn: 'root_fqn',
        );

        // Create a prophecy for AwdEsClassAttributeReader
        $classAttributeReaderProphecy = $this->prophesize(AwdEsClassAttributeReader::class);
        $classAttributeReaderProphecy
            ->read(AsIndex::class, $entityClass)
            ->willReturn($realAsIndex)
        ;

        // Instantiate the class under test
        $indexMetaReader = new AttributeIndexMetaReader($classAttributeReaderProphecy->reveal());

        // Execute the method under test
        $result = $indexMetaReader->read($entityClass);

        // Assertions
        assertInstanceOf(IndexMeta::class, $result);
        assertSame('index_name', $result->name);
        assertSame($entityClass, $result->fqn);
        assertSame('root_fqn', $result->entityFqn);
    }
}
