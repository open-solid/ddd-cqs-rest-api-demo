<?php

namespace App\Application\Delete;

use App\Application\Find\ProductFinder;
use App\Domain\Event\ProductDeletedEvent;
use App\Domain\Model\ProductId;
use App\Domain\Model\ProductRepository;
use Ddd\Domain\Event\DomainEventBus;

readonly class ProductDeleter
{
    public function __construct(
        private ProductFinder $finder,
        private ProductRepository $repository,
        private DomainEventBus $domainEventBus,
    ) {
    }

    public function delete(ProductId $id): void
    {
        $product = $this->finder->find($id);

        $this->repository->remove($product);

        $this->domainEventBus->publish(new ProductDeletedEvent($id->value()));
    }
}
