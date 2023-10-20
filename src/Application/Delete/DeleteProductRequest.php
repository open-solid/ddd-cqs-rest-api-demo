<?php

namespace App\Application\Delete;

readonly class DeleteProductRequest
{
    public function __construct(public string $id)
    {
    }
}
