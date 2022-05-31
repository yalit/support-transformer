<?php

declare(strict_types=1);

namespace App\Transformer;

class Client
{
    public function __construct(
        private TransformerContext $transformerContext,
        private LoaderContext $loaderContext
    ) {
    }

    public function treatPayload(string $payload)
    {
        $transformer = $this->transformerContext->getTransformer($payload);
        $dto = $transformer->transform($payload);

        $loader = $this->loaderContext->getLoader($dto);
        $loader->load($dto);
    }
}
