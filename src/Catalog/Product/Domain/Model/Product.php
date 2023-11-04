<?php

namespace App\Catalog\Product\Domain\Model;

use App\Catalog\Product\Domain\Event\ProductCreated;
use App\Catalog\Product\Domain\Event\ProductUpdated;
use App\Catalog\Product\Domain\Model\Props\CreateProductProps;
use App\Catalog\Product\Domain\Model\Props\UpdateProductProps;
use DateTimeImmutable;
use Ddd\Domain\Entity\AggregateRoot;
use Ddd\Domain\Trait\Time\Timestamp;
use Money\Money;

class Product
{
    use AggregateRoot;
    use Timestamp;

    private readonly int $pk;
    private readonly ProductId $id;
    private ProductName $name;
    private ProductDescription $description;
    private ProductStatus $status;
    private Money $price;

    public static function create(CreateProductProps $props): self
    {
        $product = new self();
        $product->id = $props->id;
        $product->name = $props->name;
        $product->description = $props->description;
        $product->price = $props->price;
        $product->status = $props->status;
        $product->createdAt = new DateTimeImmutable();

        $product->pushDomainEvent(new ProductCreated($props->id->value()));

        return $product;
    }

    public function update(UpdateProductProps $props): void
    {
        $this->name = $props->name;
        $this->description = $props->description;
        $this->price = $props->price;
        $this->status = $props->status;
        $this->updatedAt = new DateTimeImmutable();
        $this->pushDomainEvent(new ProductUpdated($this->id->value()));
    }

    public function id(): ProductId
    {
        return $this->id;
    }

    public function name(): ProductName
    {
        return $this->name;
    }

    public function description(): ProductDescription
    {
        return $this->description;
    }

    public function price(): Money
    {
        return $this->price;
    }

    public function status(): ProductStatus
    {
        return $this->status;
    }

    private function __construct()
    {
    }
}
