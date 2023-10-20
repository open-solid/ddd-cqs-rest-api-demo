<?php

namespace App\Presentation\Controller\Patch;

use OpenApi\Attributes\Schema;
use Yceruto\OpenApiBundle\Attributes\Property;

#[Schema]
class PatchProductPayload
{
    #[Property(maxLength: 255, minLength: 3)]
    public ?string $name = null;

    #[Property(maxLength: 255, minLength: 10)]
    public ?string $description = null;
}