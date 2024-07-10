<?php

namespace App\Catalog\Product\Application\Find;

use App\Catalog\Product\Domain\Model\Product;
use OpenSolid\Cqs\Query\Query;

/**
 * @implements Query<Product[]>
 */
readonly class FindProducts implements Query
{
    public function __construct(
        public ?string $name = null,
    ) {
    }
}
