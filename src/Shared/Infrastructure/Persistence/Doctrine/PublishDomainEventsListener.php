<?php

namespace App\Shared\Infrastructure\Persistence\Doctrine;

use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Events;
use OpenSolid\Ddd\Domain\Aggregate\AggregateRoot;
use OpenSolid\DomainEvent\Bus\DomainEventBus;

#[AsEntityListener(event: Events::postPersist)]
#[AsEntityListener(event: Events::postUpdate)]
#[AsEntityListener(event: Events::postRemove)]
readonly class PublishDomainEventsListener
{
    public function __construct(private DomainEventBus $eventBus)
    {
    }

    public function __invoke(object $entity): void
    {
        if (in_array(AggregateRoot::class, class_uses($entity), true)) {
            $this->eventBus->publish(...$entity->pullDomainEvents());
        }
    }
}
