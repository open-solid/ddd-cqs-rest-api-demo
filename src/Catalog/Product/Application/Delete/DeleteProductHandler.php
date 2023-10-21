<?php

namespace App\Catalog\Product\Application\Delete;

use App\Catalog\Product\Domain\Model\ProductId;

readonly class DeleteProductHandler
{
    public function __construct(private ProductDeleter $deleter)
    {
    }

    public function handle(DeleteProduct $command): void
    {
        $this->deleter->delete(ProductId::from($command->id));
    }
}
