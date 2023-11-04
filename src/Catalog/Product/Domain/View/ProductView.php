<?php

namespace App\Catalog\Product\Domain\View;

use App\Catalog\Product\Domain\Model\Product;
use App\Catalog\Product\Domain\Model\ProductStatus;
use DateTimeImmutable;
use Money\Money;
use OpenApi\Attributes\Schema;
use Yceruto\OpenApiBundle\Attribute\Property;

#[Schema]
readonly class ProductView
{
    use ProductViewFactory;

    #[Property(format: 'uuid')]
    public string $id;

    #[Property]
    public string $name;

    #[Property]
    public string $description;

    #[Property]
    public ProductPriceView $price;

    #[Property]
    public ProductStatus $status;

    #[Property]
    public DateTimeImmutable $createdAt;

    #[Property]
    public ?DateTimeImmutable $updatedAt;

    private function __construct(Product $product)
    {
        $this->id = $product->id();
        $this->name = $product->name();
        $this->description = $product->description();
        $this->price = ProductPriceView::from($product->price());
        $this->status = $product->status();
        $this->createdAt = $product->createdAt();
        $this->updatedAt = $product->updatedAt();
    }
}
