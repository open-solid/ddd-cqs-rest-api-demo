<?php

namespace App\Catalog\Product\Application\Find;

use Cqs\Query\Query;

readonly class FindProduct implements Query
{
    public function __construct(public string $id)
    {
    }
}
