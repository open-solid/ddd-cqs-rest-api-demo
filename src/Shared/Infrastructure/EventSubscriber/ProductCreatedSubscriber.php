<?php

namespace App\Shared\Infrastructure\EventSubscriber;

use App\Catalog\Product\Domain\Event\ProductCreated;
use OpenSolid\DomainBundle\Attribute\AsDomainEventSubscriber;
use Psr\Log\LoggerInterface;

#[AsDomainEventSubscriber]
final readonly class ProductCreatedSubscriber
{
    public function __construct(
        private LoggerInterface $logger,
    ) {
    }

    public function __invoke(ProductCreated $event): void
    {
        $this->logger->info($event::class);
    }
}
