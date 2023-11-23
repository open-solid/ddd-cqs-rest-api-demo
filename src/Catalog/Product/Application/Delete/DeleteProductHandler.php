<?php

namespace App\Catalog\Product\Application\Delete;

use App\Catalog\Product\Domain\Model\ProductId;
use OpenSolid\CqsBundle\Attribute\AsCommandHandler;

#[AsCommandHandler]
readonly class DeleteProductHandler
{
    public function __construct(private ProductDeleter $deleter)
    {
    }

    public function __invoke(DeleteProduct $command): void
    {
        $this->deleter->delete(ProductId::from($command->id));
    }
}
