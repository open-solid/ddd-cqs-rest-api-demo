<?php

namespace App\Catalog\Product\Application\Create;

use App\Catalog\Product\Domain\View\ProductNewView;
use OpenSolid\Cqs\Command\Command;

/**
 * @implements Command<ProductNewView>
 */
readonly class CreateProduct implements Command
{
    public function __construct(
         public string $id,
         public string $name,
         public string $description,
         public string $priceAmount,
         public string $priceCurrency,
         public string $status,
    ) {
    }
}
