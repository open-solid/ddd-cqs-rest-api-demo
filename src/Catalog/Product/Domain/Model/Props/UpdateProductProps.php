<?php

namespace App\Catalog\Product\Domain\Model\Props;

use App\Catalog\Product\Domain\Model\ProductDescription;
use App\Catalog\Product\Domain\Model\ProductName;
use App\Catalog\Product\Domain\Model\ProductStatus;
use Money\Money;

readonly class UpdateProductProps
{
    public function __construct(
        public ProductName $name,
        public ProductDescription $description,
        public Money $price,
        public ProductStatus $status,
    ) {
    }
}
