<?php

namespace App\Catalog\Product\Application\Update;

class UpdateProduct
{
    public function __construct(
        public string $id,
        public string $name,
        public string $description,
    ) {
    }
}
