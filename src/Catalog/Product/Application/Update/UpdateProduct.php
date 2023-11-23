<?php

namespace App\Catalog\Product\Application\Update;

use App\Catalog\Product\Domain\View\ProductView;
use OpenSolid\Cqs\Command\Command;

/**
 * @template-implements Command<ProductView>
 */
class UpdateProduct implements Command
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
