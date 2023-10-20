<?php

namespace App\Presentation\Controller\Post;

use OpenApi\Attributes\Schema;
use Yceruto\OpenApiBundle\Attributes\Property;

#[Schema]
class PostProductPayload
{
    #[Property(format: 'uuid')]
    public ?string $id = null;

    #[Property(maxLength: 255, minLength: 3)]
    public string $name;

    #[Property(maxLength: 255, minLength: 10)]
    public string $description;
}
