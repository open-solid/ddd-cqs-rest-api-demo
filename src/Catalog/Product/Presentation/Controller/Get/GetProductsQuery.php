<?php

namespace App\Catalog\Product\Presentation\Controller\Get;

use Symfony\Component\Validator\Constraints as Assert;

class GetProductsQuery
{
    #[Assert\Length(min: 3, max: 255)]
    public ?string $name = null;
}
