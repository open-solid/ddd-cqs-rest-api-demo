<?php

namespace App\Catalog\Product\Application\Find;

use App\Catalog\Product\Domain\View\ProductListItemView;
use OpenSolid\CqsBundle\Attribute\AsQueryHandler;

#[AsQueryHandler]
readonly class FindProductsHandler
{
    public function __construct(private ProductFinder $finder)
    {
    }

    public function __invoke(FindProducts $query): array
    {
        $products = $this->finder->findAll();

        return ProductListItemView::fromMany($products);
    }
}
