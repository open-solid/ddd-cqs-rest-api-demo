<?php

namespace App\Catalog\Product\Application\Delete;

use App\Catalog\Product\Application\Find\ProductFinder;
use App\Catalog\Product\Domain\Model\ProductId;
use App\Catalog\Product\Domain\Repository\ProductRepository;

readonly class ProductDeleter
{
    public function __construct(
        private ProductFinder $finder,
        private ProductRepository $repository,
    ) {
    }

    public function delete(ProductId $id): void
    {
        $product = $this->finder->findOne($id);

        $this->repository->remove($product);
    }
}
