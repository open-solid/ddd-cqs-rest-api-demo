<?php

namespace App\Domain\Model;

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
