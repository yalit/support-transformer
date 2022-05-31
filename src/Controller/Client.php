<?php

declare(strict_types=1);

namespace App\Controller;

use App\ETL\Event\WebhookEvent;
use App\ETL\Loader\LoaderContext;
use App\ETL\Transformer\TransformerContext;

class Client
{
    public function __construct(
        private TransformerContext $transformerContext,
        private LoaderContext $loaderContext
    ) {
    }

    public function treatPayload(string $payload)
    {
        $event = new WebhookEvent($payload);
        $transformer = $this->transformerContext->getTransformer($event);
        $dto = $transformer->transform($event);

        $loader = $this->loaderContext->getLoader($dto);
        $loader->load($dto);
    }
}
