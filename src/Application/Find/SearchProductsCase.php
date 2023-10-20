<?php

namespace App\Application\Find;

use App\Domain\View\ProductView;

readonly class SearchProductsCase
{
    public function __construct(private ProductFinder $finder)
    {
    }

    /**
     * @return array<ProductView>
     */
    public function execute(): array
    {
        $products = $this->finder->search();

        return ProductView::fromMany($products);
    }
}
