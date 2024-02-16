<?php

namespace App\Catalog\Product\Application\Find;

use App\Catalog\Product\Domain\Error\ProductNotFound;
use App\Catalog\Product\Domain\Model\Product;
use App\Catalog\Product\Domain\Model\ProductId;
use App\Catalog\Product\Domain\Repository\ProductRepository;

readonly class ProductFinder
{
    public function __construct(
        private ProductRepository $repository,
    ) {
    }

    public function findOne(ProductId $id): Product
    {
        return $this->repository->ofId($id) ?? throw ProductNotFound::from($id);
    }

    /**
     * @return array<Product>
     */
    public function findAll(): array
    {
        return $this->repository->all();
    }
}
