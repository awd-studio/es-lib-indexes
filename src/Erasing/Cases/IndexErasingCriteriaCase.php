<?php

declare(strict_types=1);

namespace AwdEs\Indexes\Erasing\Cases;

use Awd\ValueObject\IDateTime;
use AwdEs\Indexes\Erasing\IndexErasingCriteria;

interface IndexErasingCriteriaCase
{
    /**
     * /**
     * Processes the IndexErasingCriteria based on specific logic.
     *
     * This method accepts an instance of `IndexErasingCriteria` to evaluate if the erasing
     * operation is valid. Additionally, it understands the erasure timing via `IDateTime`.
     *
     * - If the criteria meet the defined rules, the method returns `true`.
     * - If the criteria do not meet the rules, it returns `null`.
     * - If an error occurs during processing, it throws an `IndexErasingError` exception.
     *
     * @param IndexErasingCriteria $criteria the criteria to evaluate for erasing
     * @param IDateTime            $erasedAt the date and time when the erasure is to be performed
     *
     * @return true|null returns true if criteria passes; returns null otherwise
     *
     * @throws \AwdEs\Indexes\Erasing\Exception\IndexErasingError if an error occurs during processing
     */
    public function handle(IndexErasingCriteria $criteria, IDateTime $erasedAt): ?true;
}
