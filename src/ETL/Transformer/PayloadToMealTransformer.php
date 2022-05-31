<?php

declare(strict_types=1);

namespace App\ETL\Transformer;

use App\ETL\DTO\Meal;
use App\ETL\Event\EventType;
use App\ETL\Event\WebhookEvent;

class PayloadToMealTransformer implements TransformerInterface
{

    public function supports(EventType $event): bool
    {
        if (!$event instanceof WebhookEvent) {
            return false;
        }

        return property_exists(json_decode($event->getPayload()), 'event_name');
    }

    public function transform(EventType $event): Meal
    {
        if (!$this->supports($event)) {
            throw new \Exception("This is not the correct Event Type");
        }

        $payload = $event->getPayload();
        $object = json_decode($payload);

        //Here the code to transform the payload into a Meal
    }
}
