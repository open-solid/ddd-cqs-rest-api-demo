<?php

namespace App\Catalog\Product\Application\Create;

use App\Catalog\Product\Domain\Model\Product;
use App\Catalog\Product\Domain\Model\ProductDescription;
use App\Catalog\Product\Domain\Model\ProductId;
use App\Catalog\Product\Domain\Model\ProductName;
use App\Catalog\Product\Domain\Model\ProductStatus;
use App\Catalog\Product\Domain\Repository\ProductRepository;
use Ddd\Domain\Event\DomainEventPublisher;

readonly class ProductFactory
{
    public function __construct(
        private ProductRepository $repository,
        private DomainEventPublisher $domainEventPublisher,
    ) {
    }

    public function create(ProductId $id, ProductName $name, ProductDescription $description, ProductStatus $status): Product
    {
        $product = Product::create($id, $name, $description, $status);

        $this->repository->add($product);

        $this->domainEventPublisher->publish(...$product->pullDomainEvents());

        return $product;
    }
}
