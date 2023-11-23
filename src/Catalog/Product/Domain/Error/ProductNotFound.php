<?php

namespace App\Catalog\Product\Domain\Error;

use App\Catalog\Product\Domain\Model\ProductId;
use OpenSolid\Ddd\Domain\Error\EntityNotFound;

class ProductNotFound extends EntityNotFound
{
    public static function from(ProductId $id): self
    {
        return self::create(sprintf('Product with id "%s" not found.', $id->value()));
    }
}
