<?php

namespace App\Catalog\Product\Domain\View;

use Money\Money;
use OpenApi\Attributes\Schema;
use OpenSolid\OpenApiBundle\Attribute\Property;

#[Schema]
readonly class ProductPriceView
{
    #[Property(description: 'The product price amount in cents')]
    public string $amount;

    #[Property(description: 'The product price currency')]
    public string $currency;

    public static function from(Money $price): self
    {
        return new self($price);
    }

    private function __construct(Money $price)
    {
        $this->amount = $price->getAmount();
        $this->currency = $price->getCurrency()->getCode();
    }
}
