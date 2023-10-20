<?php

namespace App\Application\Delete;

use App\Domain\Model\ProductId;

readonly class DeleteProductCase
{
    public function __construct(private ProductDeleter $deleter)
    {
    }

    public function execute(DeleteProductRequest $request): void
    {
        $this->deleter->delete(ProductId::from($request->id));
    }
}
