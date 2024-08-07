<?php

namespace App\Catalog\Product\Application\Find;

use OpenSolid\CqsBundle\Attribute\AsQueryHandler;

#[AsQueryHandler]
readonly class FindProductsHandler
{
    public function __construct(
        private ProductFinder $finder,
    ) {
    }

    public function __invoke(FindProducts $query): array
    {
        return $this->finder->findAll();
    }
}
