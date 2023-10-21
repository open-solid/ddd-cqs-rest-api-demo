<?php

namespace App\Catalog\Product\Application\Create;

readonly class CreateProduct
{
    public function __construct(
         public string $id,
         public string $name,
         public string $description,
    ) {
    }
}
