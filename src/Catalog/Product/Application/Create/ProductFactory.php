<?php

namespace App\Catalog\Product\Application\Create;

use App\Catalog\Product\Domain\Model\Product;
use App\Catalog\Product\Domain\Model\Props\CreateProductProps;
use App\Catalog\Product\Domain\Repository\ProductRepository;
use Ddd\Domain\Event\DomainEventBus;

readonly class ProductFactory
{
    public function __construct(
        private ProductRepository $repository,
        private DomainEventBus $domainEventBus,
    ) {
    }

    public function create(CreateProductProps $props): Product
    {
        $product = Product::create($props);

        $this->repository->add($product);

        $this->domainEventBus->publish(...$product->pullDomainEvents());

        return $product;
    }
}
