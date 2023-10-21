<?php

namespace App\Catalog\Product\Application\Find;

use App\Catalog\Product\Domain\View\ProductListItemView;

readonly class FindProductsHandler
{
    public function __construct(private ProductFinder $finder)
    {
    }

    /**
     * @return array<ProductListItemView>
     */
    public function handle(FindProducts $query): array
    {
        $products = $this->finder->findAll();

        return ProductListItemView::fromMany($products);
    }
}
