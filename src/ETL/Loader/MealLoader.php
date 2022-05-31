<?php

declare(strict_types=1);

namespace App\ETL\Loader;

use App\ETL\DTO\DTO;
use App\ETL\DTO\Meal;

class MealLoader implements LoaderInterface
{

    public function supports(DTO $dto): bool
    {
        return $dto instanceof Meal;
    }

    public function load(DTO $dto): void
    {
        // here the code to load a Meal...
    }
}
