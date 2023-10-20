<?php

namespace App\Application\Find;

use App\Domain\Error\ProductNotFoundError;
use App\Domain\Model\Product;
use App\Domain\Model\ProductId;
use App\Domain\Model\ProductRepository;

readonly class ProductFinder
{
    public function __construct(private ProductRepository $repository)
    {
    }

    public function find(ProductId $id): Product
    {
        return $this->repository->ofId($id) ?? throw ProductNotFoundError::from($id);
    }

    /**
     * @return array<Product>
     */
    public function search(): array
    {
        return $this->repository->all();
    }
}
