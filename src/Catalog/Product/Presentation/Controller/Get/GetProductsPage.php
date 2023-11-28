<?php

namespace App\Catalog\Product\Presentation\Controller\Get;

use OpenSolid\OpenApiBundle\Attribute\Param;
use Symfony\Component\Validator\Constraints as Assert;

class GetProductsPage
{
    #[Param]
    #[Assert\PositiveOrZero]
    public int $offset = 0;

    #[Param]
    #[Assert\PositiveOrZero]
    public int $limit = 10;
}
