<?php

namespace App\Application\Update;

use App\Application\Find\ProductFinder;
use App\Domain\Model\Product;
use App\Domain\Model\ProductDescription;
use App\Domain\Model\ProductId;
use App\Domain\Model\ProductName;
use Ddd\Domain\Event\DomainEventBus;

readonly class ProductUpdater
{
    public function __construct(
        private ProductFinder $finder,
        private DomainEventBus $domainEventBus,
    ) {
    }

    public function update(ProductId $id, ProductName $name, ProductDescription $description): Product
    {
        $product = $this->finder->find($id);
        $product->update($name, $description);

        $this->domainEventBus->publish(...$product->pullDomainEvents());

        return $product;
    }
}
