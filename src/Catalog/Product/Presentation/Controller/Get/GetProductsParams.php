<?php

namespace App\Catalog\Product\Presentation\Controller\Get;

use OpenSolid\OpenApiBundle\Attribute\Param;
use Symfony\Component\Validator\Constraints as Assert;

class GetProductsParams
{
    #[Param]
    #[Assert\Length(min: 3, max: 255)]
    public ?string $name = null;
}
