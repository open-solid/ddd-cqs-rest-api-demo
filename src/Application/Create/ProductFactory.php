<?php

namespace App\Application\Create;

use App\Domain\Model\Product;
use App\Domain\Model\ProductDescription;
use App\Domain\Model\ProductId;
use App\Domain\Model\ProductName;
use App\Domain\Model\ProductRepository;
use Ddd\Domain\Event\DomainEventBus;

readonly class ProductFactory
{
    public function __construct(
        private ProductRepository $repository,
        private DomainEventBus $domainEventBus,
    ) {
    }

    public function create(ProductId $id, ProductName $name, ProductDescription $description): Product
    {
        $product = Product::create($id, $name, $description);

        $this->repository->add($product);

        $this->domainEventBus->publish(...$product->pullDomainEvents());

        return $product;
    }
}
