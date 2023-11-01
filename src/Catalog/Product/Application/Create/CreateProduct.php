<?php

namespace App\Catalog\Product\Application\Create;

use App\Catalog\Product\Domain\View\ProductNewView;
use Cqs\Command\Command;

/**
 * @template-implements Command<ProductNewView>
 */
readonly class CreateProduct implements Command
{
    public function __construct(
         public string $id,
         public string $name,
         public string $description,
    ) {
    }
}
