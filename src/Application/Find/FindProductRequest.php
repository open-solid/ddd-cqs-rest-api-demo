<?php

namespace App\Application\Find;

readonly class FindProductRequest
{
    public function __construct(public string $id)
    {
    }
}
