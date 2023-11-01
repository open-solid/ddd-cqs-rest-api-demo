<?php

namespace App\Catalog\Product\Application\Find;

use App\Catalog\Product\Domain\View\ProductView;
use Cqs\Query\Query;

/**
 * @template-implements Query<ProductView>
 */
readonly class FindProduct implements Query
{
    public function __construct(public string $id)
    {
    }
}
