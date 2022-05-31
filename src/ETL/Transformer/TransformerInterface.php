<?php

declare(strict_types=1);

namespace App\ETL\Transformer;

use App\ETL\DTO\DTO;

interface TransformerInterface
{
    public function supports(string $payload): bool;

    public function transform(string $payload): DTO;
}