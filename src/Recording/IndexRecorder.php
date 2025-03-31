<?php

declare(strict_types=1);

namespace AwdEs\Indexes\Recording;

use Awd\ValueObject\IDateTime;
use AwdEs\Indexes\Index;

interface IndexRecorder
{
    /**
     * @template T
     *
     * @param Index<T> $index
     *
     * @throws Exception\IndexRecordingError
     */
    public function record(Index $index, IDateTime $recordedAt): void;
}
