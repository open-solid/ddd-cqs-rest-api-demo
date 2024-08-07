<?php

namespace App\Catalog\Product\Application\Update;

use App\Catalog\Product\Application\Find\ProductFinder;
use App\Catalog\Product\Domain\Model\Product;
use App\Catalog\Product\Domain\Model\ProductId;
use App\Catalog\Product\Domain\Model\Props\UpdateProductProps;

readonly class ProductUpdater
{
    public function __construct(
        private ProductFinder $finder,
    ) {
    }

    public function update(ProductId $id, UpdateProductProps $props): Product
    {
        $product = $this->finder->findOne($id);

        $product->update($props);

        return $product;
    }
}
