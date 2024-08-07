<?php

namespace App\Catalog\Product\Presentation\Controller\Post;

use App\Catalog\Product\Domain\Model\ProductStatus;
use App\Catalog\Product\Presentation\Model\ProductPriceBody;
use OpenApi\Attributes\Schema;
use OpenSolid\OpenApiBundle\Attribute\Property;

#[Schema(
    description: 'Create a new product',
    writeOnly: true,
)]
class PostProductBody
{
    #[Property(
        description: 'The unique identifier of the new product',
        format: 'uuid',
    )]
    public ?string $id = null;

    #[Property(
        description: 'The name of the new product',
        maxLength: 255,
        minLength: 3,
    )]
    public string $name;

    #[Property(
        description: 'The description of the new product',
        maxLength: 255,
        minLength: 10,
    )]
    public string $description;

    #[Property(description: 'The price of the product')]
    public ProductPriceBody $price;

    #[Property(
        description: 'The initial status of the product',
        enum: [ProductStatus::DRAFT, ProductStatus::PUBLISHED],
    )]
    public string $status;
}
