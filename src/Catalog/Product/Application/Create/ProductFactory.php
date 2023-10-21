<?php

namespace App\Catalog\Product\Application\Create;

use App\Catalog\Product\Domain\Model\Product;
use App\Catalog\Product\Domain\Model\ProductDescription;
use App\Catalog\Product\Domain\Model\ProductId;
use App\Catalog\Product\Domain\Model\ProductName;
use App\Catalog\Product\Domain\Model\ProductRepository;
use Ddd\Domain\Event\DomainEventPublisher;

readonly class ProductFactory
{
    public function __construct(
        private ProductRepository $repository,
        private DomainEventPublisher $DomainEventPublisher,
    ) {
    }

    public function create(ProductId $id, ProductName $name, ProductDescription $description): Product
    {
        $product = Product::create($id, $name, $description);

        $this->repository->add($product);

        $this->DomainEventPublisher->publish(...$product->pullDomainEvents());

        return $product;
    }
}
