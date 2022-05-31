<?php

declare(strict_types=1);

namespace App\ETL\Event;

class WebhookEvent implements EventType
{

    public function __construct(private string $payload)
    {
    }

    public function getPayload(): string
    {
        return $this->payload;
    }
}
