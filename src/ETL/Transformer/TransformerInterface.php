<?php

declare(strict_types=1);

namespace App\ETL\Transformer;

use App\ETL\DTO\DTO;
use App\ETL\Event\EventType;

interface TransformerInterface
{
    public function supports(EventType $event): bool;

    public function transform(EventType $event): DTO;
}