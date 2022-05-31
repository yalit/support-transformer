<?php

declare(strict_types=1);

namespace App\ETL\Loader;

use App\ETL\DTO\DTO;

interface LoaderInterface
{
    public function supports(DTO $dto): bool;
    public function load(DTO $dto): void;
}