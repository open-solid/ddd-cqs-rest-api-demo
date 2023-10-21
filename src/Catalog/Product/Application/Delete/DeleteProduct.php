<?php

namespace App\Catalog\Product\Application\Delete;

use Cqs\Command\Command;

readonly class DeleteProduct implements Command
{
    public function __construct(public string $id)
    {
    }
}
