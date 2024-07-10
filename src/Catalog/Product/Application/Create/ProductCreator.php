<?php

namespace App\Catalog\Product\Application\Create;

use App\Catalog\Product\Domain\Model\Product;
use App\Catalog\Product\Domain\Model\Props\CreateProductProps;
use App\Catalog\Product\Domain\Repository\ProductRepository;

readonly class ProductCreator
{
    public function __construct(
        private ProductRepository $repository,
    ) {
    }

    public function create(CreateProductProps $props): Product
    {
        $product = Product::create($props);

        $this->repository->add($product);

        return $product;
    }
}
