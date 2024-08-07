<?php

namespace App\Catalog\Product\Application\Find;

use App\Catalog\Product\Domain\Model\Product;
use OpenSolid\Cqs\Query\Query;

/**
 * @extends Query<list<Product>>
 */
readonly class FindProducts extends Query
{
    public function __construct(
        public ?string $name = null,
    ) {
    }
}
