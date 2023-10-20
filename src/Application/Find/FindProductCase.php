<?php

namespace App\Application\Find;

use App\Domain\Model\ProductId;
use App\Domain\View\ProductView;

readonly class FindProductCase
{
    public function __construct(private ProductFinder $finder)
    {
    }

    public function execute(FindProductRequest $request): ProductView
    {
        $product = $this->finder->find(ProductId::from($request->id));

        return ProductView::from($product);
    }
}
