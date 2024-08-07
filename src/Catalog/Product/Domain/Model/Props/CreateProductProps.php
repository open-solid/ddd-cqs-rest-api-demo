<?php

namespace App\Catalog\Product\Domain\Model\Props;

use App\Catalog\Product\Domain\Model\ProductDescription;
use App\Catalog\Product\Domain\Model\ProductId;
use App\Catalog\Product\Domain\Model\ProductName;
use App\Catalog\Product\Domain\Model\ProductStatus;
use Money\Money;

final readonly class CreateProductProps
{
    public function __construct(
        public ProductId $id,
        public ProductName $name,
        public ProductDescription $description,
        public Money $price,
        public ProductStatus $status = ProductStatus::DRAFT,
    ) {
    }
}
