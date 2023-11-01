<?php

namespace App\Catalog\Product\Domain\Repository;

use App\Catalog\Product\Domain\Model\Product;
use App\Catalog\Product\Domain\Model\ProductId;

interface ProductRepository
{
    public function add(Product $product): void;

    public function remove(Product $product): void;

    public function ofId(ProductId $id): ?Product;

    /**
     * @return array<Product>
     */
    public function all(): array;
}
