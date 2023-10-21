<?php

namespace App\Catalog\Product\Application\Update;

use Cqs\Command\Command;

class UpdateProduct implements Command
{
    public function __construct(
        public string $id,
        public string $name,
        public string $description,
    ) {
    }
}
