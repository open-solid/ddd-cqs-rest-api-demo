<?php

namespace App\Catalog\Product\Presentation\Controller\Post;

use OpenApi\Attributes\Schema;
use Yceruto\OpenApiBundle\Attributes\Property;

#[Schema(
    title: 'Create Product',
    description: 'Create a new product',
    required: ['name', 'description'], // @TODO: auto-populate from properties
    writeOnly: true,
)]
class PostProductPayload
{
    #[Property(
        description: 'The unique identifier of the product',
        format: 'uuid',
    )]
    public ?string $id = null;

    #[Property(
        description: 'The name of the product',
        maxLength: 255,
        minLength: 3,
    )]
    public string $name;

    #[Property(
        description: 'The description of the product',
        maxLength: 255,
        minLength: 10,
    )]
    public string $description;
}
