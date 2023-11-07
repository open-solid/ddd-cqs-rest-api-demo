<?php

namespace App\Catalog\Product\Presentation\Controller\Patch;

use App\Catalog\Product\Domain\Model\ProductStatus;
use App\Catalog\Product\Presentation\Payload\ProductPricePayload;
use OpenApi\Attributes\Schema;
use Yceruto\OpenApiBundle\Attribute\Property;

#[Schema(writeOnly: true)]
class PatchProductPayload
{
    #[Property(maxLength: 255, minLength: 3)]
    public ?string $name = null;

    #[Property(maxLength: 255, minLength: 10)]
    public ?string $description = null;

    #[Property]
    public ?ProductPricePayload $price = null;

    #[Property(enum: ProductStatus::class)]
    public ?string $status = null;
}
