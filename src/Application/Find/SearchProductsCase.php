<?php

namespace App\Application\Find;

use App\Domain\View\ProductListItemView;

readonly class SearchProductsCase
{
    public function __construct(private ProductFinder $finder)
    {
    }

    /**
     * @return array<ProductListItemView>
     */
    public function execute(): array
    {
        $products = $this->finder->search();

        return ProductListItemView::fromMany($products);
    }
}
