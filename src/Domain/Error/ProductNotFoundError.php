<?php

namespace App\Domain\Error;

use App\Domain\Model\ProductId;
use Ddd\Domain\Error\EntityNotFoundError;

class ProductNotFoundError extends EntityNotFoundError
{
    public static function from(ProductId $id): self
    {
        return self::create(sprintf('Product with id "%s" not found.', $id->value()));
    }
}
