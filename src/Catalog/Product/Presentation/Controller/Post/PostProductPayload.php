<?php

namespace App\Catalog\Product\Presentation\Controller\Post;

use App\Catalog\Product\Domain\Model\ProductStatus;
use OpenApi\Attributes\Schema;
use Yceruto\OpenApiBundle\Attribute\Property;

#[Schema(
    title: 'Create Product',
    description: 'Create a new product',
    writeOnly: true,
)]
class PostProductPayload
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

    #[Property(enum: [ProductStatus::DRAFT, ProductStatus::PUBLISHED])]
    public string $status;
}
