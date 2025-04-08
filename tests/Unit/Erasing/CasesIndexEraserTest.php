<?php

declare(strict_types=1);

namespace AwdEs\Indexes\Tests\Unit\Erasing;

use Awd\ValueObject\IDateTime;
use AwdEs\Indexes\Erasing\Cases\IndexErasingCriteriaCase;
use AwdEs\Indexes\Erasing\CasesIndexEraser;
use AwdEs\Indexes\Erasing\Exception\IndexErasingError;
use AwdEs\Indexes\Erasing\IndexErasingCriteria;
use AwdEs\Indexes\Tests\Shared\AppTestCase;
use Prophecy\Prophecy\ObjectProphecy;

use function PHPUnit\Framework\assertTrue;

/**
 * @coversDefaultClass \AwdEs\Indexes\Erasing\CasesIndexEraser
 *
 * @internal
 */
final class CasesIndexEraserTest extends AppTestCase
{
    public function testEraseMustHandleEraseWhenCaseMatches(): void
    {
        // Mock dependencies
        $criteria = $this->prophesize(IndexErasingCriteria::class)->reveal();
        $erasedAt = $this->prophesize(IDateTime::class)->reveal();

        /** @var IndexErasingCriteriaCase|ObjectProphecy $matchingCaseProphecy */
        $matchingCaseProphecy = $this->prophesize(IndexErasingCriteriaCase::class);
        $matchingCaseProphecy
            ->handle($criteria, $erasedAt)
            ->willReturn(true)
        ;

        /** @var IndexErasingCriteriaCase|ObjectProphecy $nonMatchingCaseProphecy */
        $nonMatchingCaseProphecy = $this->prophesize(IndexErasingCriteriaCase::class);
        $nonMatchingCaseProphecy
            ->handle($criteria, $erasedAt)
            ->willReturn(null)
        ;

        $cases = [
            $nonMatchingCaseProphecy->reveal(),
            $matchingCaseProphecy->reveal(),
        ];

        // Instantiate the class under test
        $erasedIndex = new CasesIndexEraser($cases);

        $erasedIndex->erase($criteria, $erasedAt);
        assertTrue(true); // Case matched, no exception thrown
    }

    public function testEraseMustThrowExceptionWhenNoCaseMatches(): void
    {
        // Mock dependencies
        $criteria = $this->prophesize(IndexErasingCriteria::class)->reveal();
        $erasedAt = $this->prophesize(IDateTime::class)->reveal();

        /** @var IndexErasingCriteriaCase|ObjectProphecy $nonMatchingCaseProphecy */
        $nonMatchingCaseProphecy1 = $this->prophesize(IndexErasingCriteriaCase::class);
        $nonMatchingCaseProphecy1
            ->handle($criteria, $erasedAt)
            ->willReturn(null)
        ;

        /** @var IndexErasingCriteriaCase|ObjectProphecy $nonMatchingCaseProphecy */
        $nonMatchingCaseProphecy2 = $this->prophesize(IndexErasingCriteriaCase::class);
        $nonMatchingCaseProphecy2
            ->handle($criteria, $erasedAt)
            ->willReturn(null)
        ;

        $cases = [
            $nonMatchingCaseProphecy1->reveal(),
            $nonMatchingCaseProphecy2->reveal(),
        ];

        // Instantiate the class under test
        $erasedIndex = new CasesIndexEraser($cases);

        // Call the method under test and expect an exception
        $this->expectException(IndexErasingError::class);
        $erasedIndex->erase($criteria, $erasedAt);
    }
}
