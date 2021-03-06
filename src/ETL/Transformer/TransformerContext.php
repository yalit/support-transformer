<?php

declare(strict_types=1);

namespace App\ETL\Transformer;

use App\ETL\Event\EventType;

class TransformerContext
{
    /**
     * @var Array<TransformerInterface>
     */
    private array $transformers = [];

    public function addTransformer(TransformerInterface $transformer): void
    {
        if (!array_key_exists($transformer::class, $this->transformers)) {
            $transformer[$transformer::class] = $transformer;
        }
    }

    public function getTransformer(EventType $event): ?TransformerInterface
    {
        foreach ($this->transformers as $transformer)
        {
            if ($transformer->supports($event)){
                return $transformer;
            }
        }

        return null;
    }
}
