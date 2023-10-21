<?php

namespace App\Catalog\Product\Application\Find;

use Cqs\Query\Query;

readonly class FindProducts implements Query
{
    public function __construct(public ?string $name = null)
    {
    }
}
