<?php

namespace App\Catalog\Product\Application\Find;

readonly class FindProducts
{
    public function __construct(public ?string $name = null)
    {
    }
}
