<?php

namespace App\Catalog\Product\Application\Find;

use App\Catalog\Product\Domain\View\ProductListItemView;
use OpenSolid\Cqs\Query\Query;

/**
 * @implements Query<ProductListItemView[]>
 */
readonly class FindProducts implements Query
{
    public function __construct(
        public ?string $name = null,
    ) {
    }
}
