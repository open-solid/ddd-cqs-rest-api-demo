<?php

namespace App\Catalog\Product\Infrastructure\Persistence\Doctrine\Listener;

use App\Catalog\Product\Domain\Event\ProductDeleted;
use App\Catalog\Product\Domain\Model\Product;
use Ddd\Domain\Event\DomainEventBus;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Events;

#[AsEntityListener(event: Events::postPersist, entity: Product::class)]
#[AsEntityListener(event: Events::postUpdate, entity: Product::class)]
#[AsEntityListener(event: Events::postRemove, entity: Product::class)]
readonly class ProductListener
{
    public function __construct(private DomainEventBus $eventBus)
    {
    }

    public function postPersist(Product $entity): void
    {
        $this->eventBus->publish(...$entity->pullDomainEvents());
    }

    public function postUpdate(Product $entity): void
    {
        $this->eventBus->publish(...$entity->pullDomainEvents());
    }

    public function postRemove(Product $entity): void
    {
        $this->eventBus->publish(new ProductDeleted($entity->id()->value()));
    }
}
