<?php

declare(strict_types=1);

namespace App\ETL\Loader;

use App\ETL\DTO\DTO;

class LoaderContext
{
    /**
     * @var Array<LoaderInterface>
     */
    private array $loaders = [];

    public function addLoader(LoaderInterface $loader): void
    {
        if (!array_key_exists($loader::class, $this->loaders)) {
            $loader[$loader::class] = $loader;
        }
    }

    public function getLoader(DTO $dto): ?LoaderInterface
    {
        foreach ($this->loaders as $loader)
        {
            if ($loader->supports($dto)){
                return $loader;
            }
        }

        return null;
    }
}
