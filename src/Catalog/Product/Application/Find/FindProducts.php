<?php

namespace App\Catalog\Product\Application\Find;

use App\Catalog\Product\Domain\View\ProductListItemView;
use Cqs\Query\Query;

/**
 * @template-implements Query<ProductListItemView[]>
 */
readonly class FindProducts implements Query
{
    public function __construct(public ?string $name = null)
    {
    }
}
