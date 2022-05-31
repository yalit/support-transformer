<?php

declare(strict_types=1);

namespace App\ETL\Transformer;

use App\ETL\DTO\Meal;

class PayloadToMealTransformer implements TransformerInterface
{

    public function supports(string $payload): bool
    {
        $object = json_decode($payload);
        if(!property_exists($object, 'event_name')) {
            return false;
        }

        if (in_array($object->event_name, ['','',''])) {
            return true;
        }

        return false;
    }

    public function transform(string $payload): Meal
    {
        //Here the code to transform the payload into a Meal
    }
}
