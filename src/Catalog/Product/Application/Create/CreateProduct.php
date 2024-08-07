<?php

namespace App\Catalog\Product\Application\Create;

use App\Catalog\Product\Domain\Model\Product;
use OpenSolid\Cqs\Command\Command;

/**
 * @implements Command<Product>
 */
readonly class CreateProduct extends Command
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
