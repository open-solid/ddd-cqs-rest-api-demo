<?php

namespace App\Catalog\Product\Domain\View;

use App\Catalog\Product\Domain\Model\Product;
use DateTimeImmutable;
use OpenApi\Attributes\Schema;
use Yceruto\OpenApiBundle\Attribute\Property;

#[Schema]
readonly class ProductListItemView
{
    use ProductViewFactory;

    #[Property(format: 'uuid')]
    public string $id;

    #[Property]
    public string $name;

    #[Property]
    public DateTimeImmutable $createdAt;

    private function __construct(Product $product)
    {
        $this->id = $product->id();
        $this->name = $product->name();
        $this->createdAt = $product->createdAt();
    }
}
