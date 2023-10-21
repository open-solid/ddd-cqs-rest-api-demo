<?php

namespace App\Catalog\Product\Application\Create;

use Cqs\Command\Command;

readonly class CreateProduct implements Command
{
    public function __construct(
         public string $id,
         public string $name,
         public string $description,
    ) {
    }
}
