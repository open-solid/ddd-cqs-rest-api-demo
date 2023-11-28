<?php

namespace App\Catalog\Product\Presentation\Controller\Get;

use OpenSolid\OpenApiBundle\Attribute\Param;

class GetProductsParams
{
    #[Param]
    public ?string $sort = null;

    public ?GetProductsPage $page = null;

    public ?GetProductsFilter $filter = null;
}
