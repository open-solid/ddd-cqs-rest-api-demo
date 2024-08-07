<?php

namespace App\Catalog\Product\Application\Find;

use App\Catalog\Product\Domain\View\ProductView;
use OpenSolid\Cqs\Query\Query;

/**
 * @implements Query<ProductView>
 */
readonly class FindProduct implements Query
{
    public function __construct(
        public string $id
    ) {
    }
}
