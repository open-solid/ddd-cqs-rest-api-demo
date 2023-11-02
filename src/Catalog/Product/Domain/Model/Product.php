<?php

namespace App\Catalog\Product\Domain\Model;

use App\Catalog\Product\Domain\Event\ProductCreated;
use App\Catalog\Product\Domain\Event\ProductUpdated;
use DateTimeImmutable;
use Ddd\Domain\Entity\AggregateRoot;
use Ddd\Domain\Trait\Time\Timestamp;

class Product
{
    use AggregateRoot;
    use Timestamp;

    private readonly int $pk;
    private readonly ProductId $id;
    private ProductName $name;
    private ProductDescription $description;

    public static function create(ProductId $id, ProductName $name, ProductDescription $description): self
    {
        $self = new self();
        $self->id = $id;
        $self->name = $name;
        $self->description = $description;
        $self->createdAt = new DateTimeImmutable();
        $self->pushDomainEvent(new ProductCreated($id->value()));

        return $self;
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

    public function update(ProductName $name, ProductDescription $description): void
    {
        $this->name = $name;
        $this->description = $description;
        $this->updatedAt = new DateTimeImmutable();
        $this->pushDomainEvent(new ProductUpdated($this->id->value()));
    }

    private function __construct()
    {
    }
}
