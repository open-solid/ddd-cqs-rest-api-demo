<?php

namespace App\Application\Create;

readonly class CreateProductRequest
{
    public function __construct(
         public string $id,
         public string $name,
         public string $description,
    ) {
    }
}
