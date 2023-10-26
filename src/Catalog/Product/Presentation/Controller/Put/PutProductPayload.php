<?php

namespace App\Catalog\Product\Presentation\Controller\Put;

use OpenApi\Attributes\Schema;
use Yceruto\OpenApiBundle\Attribute\Property;

#[Schema(writeOnly: true)]
class PutProductPayload
{
    #[Property(maxLength: 255, minLength: 3)]
    public string $name;

    #[Property(maxLength: 255, minLength: 10)]
    public string $description;
}
