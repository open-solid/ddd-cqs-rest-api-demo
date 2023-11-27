<?php

namespace App\Catalog\Product\Presentation\Controller\Get;

use Symfony\Component\Validator\Constraints as Assert;

class GetProductsParams
{
    #[Assert\Length(min: 3, max: 255)]
    public ?string $name = null;
}
