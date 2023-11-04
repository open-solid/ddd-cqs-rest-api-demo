<?php

namespace App\Catalog\Product\Presentation\Payload;

use OpenApi\Attributes\Schema;
use Yceruto\OpenApiBundle\Attribute\Property;

#[Schema(
    title: 'Product price',
    writeOnly: true
)]
class ProductPricePayload
{
    #[Property(
        description: 'The product price amount in cents',
        example: '1000',
    )]
    public string $amount;

    #[Property(
        description: 'The product price currency',
        format: 'currency',
        example: 'EUR',
    )]
    public string $currency;
}
