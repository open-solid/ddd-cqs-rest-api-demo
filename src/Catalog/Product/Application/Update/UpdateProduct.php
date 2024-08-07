<?php

namespace App\Catalog\Product\Application\Update;

use App\Catalog\Product\Domain\Model\Product;
use OpenSolid\Cqs\Command\Command;

/**
 * @extends Command<Product>
 */
readonly class UpdateProduct extends Command
{
    public function __construct(
        public string $id,
        public ?string $name,
        public ?string $description,
        public ?string $priceAmount,
        public ?string $priceCurrency,
        public ?string $status,
    ) {
    }
}
