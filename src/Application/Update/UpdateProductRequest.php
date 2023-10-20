<?php

namespace App\Application\Update;

class UpdateProductRequest
{
    public function __construct(
        public string $id,
        public string $name,
        public string $description,
    ) {
    }
}
