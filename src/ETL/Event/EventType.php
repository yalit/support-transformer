<?php

declare(strict_types=1);

namespace App\ETL\Event;

interface EventType
{
    public function getPayload(): string;
}