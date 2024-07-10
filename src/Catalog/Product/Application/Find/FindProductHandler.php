<?php

namespace App\Catalog\Product\Application\Find;

use App\Catalog\Product\Domain\Model\Product;
use App\Catalog\Product\Domain\Model\ProductId;
use OpenSolid\CqsBundle\Attribute\AsQueryHandler;

#[AsQueryHandler]
readonly class FindProductHandler
{
    public function __construct(
        private ProductFinder $finder,
    ) {
    }

    public function __invoke(FindProduct $query): Product
    {
        return $this->finder->findOne(ProductId::from($query->id));
    }
}
