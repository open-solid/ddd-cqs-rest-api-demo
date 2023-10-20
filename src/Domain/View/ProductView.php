<?php

namespace App\Domain\View;

use App\Domain\Model\Product;
use DateTimeImmutable;
use OpenApi\Attributes\Schema;
use Yceruto\OpenApiBundle\Attributes\Property;

#[Schema]
readonly class ProductView
{
    #[Property(format: 'uuid')]
    public string $id;

    #[Property]
    public string $name;

    #[Property]
    public string $description;

    #[Property]
    public DateTimeImmutable $createdAt;

    #[Property]
    public ?DateTimeImmutable $updatedAt;

    /**
     * @param array<Product> $products
     *
     * @return array<self>
     */
    public static function fromMany(array $products): array
    {
        return array_map(self::from(...), $products);
    }

    public static function from(Product $product): self
    {
        return new self($product);
    }

    private function __construct(Product $product)
    {
        $this->id = $product->id();
        $this->name = $product->name();
        $this->description = $product->description();
        $this->createdAt = $product->createdAt();
        $this->updatedAt = $product->updatedAt();
    }
}
