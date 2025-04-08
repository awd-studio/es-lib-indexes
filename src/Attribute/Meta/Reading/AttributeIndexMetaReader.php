<?php

declare(strict_types=1);

namespace AwdEs\Indexes\Attribute\Meta\Reading;

use AwdEs\Attribute\Reading\AwdEsClassAttributeReader;
use AwdEs\Indexes\Attribute\AsIndex;
use AwdEs\Indexes\Meta\IndexMeta;
use AwdEs\Indexes\Meta\Reading\IndexMetaReader;

final readonly class AttributeIndexMetaReader implements IndexMetaReader
{
    public function __construct(
        private AwdEsClassAttributeReader $reader,
    ) {}

    #[\Override]
    public function read(string $entityClass): IndexMeta
    {
        $attr = $this->reader->read(AsIndex::class, $entityClass);

        return new IndexMeta($attr->name, $entityClass, $attr->entityFqn);
    }
}
