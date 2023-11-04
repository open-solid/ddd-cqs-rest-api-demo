<?php

namespace App\Catalog\Product\Infrastructure\Persistence\InMemory;

use App\Catalog\Product\Domain\Model\Product;
use App\Catalog\Product\Domain\Model\ProductDescription;
use App\Catalog\Product\Domain\Model\ProductId;
use App\Catalog\Product\Domain\Model\ProductName;
use App\Catalog\Product\Domain\Model\ProductStatus;
use App\Catalog\Product\Domain\Model\Props\CreateProductProps;
use App\Catalog\Product\Domain\Repository\ProductRepository;
use Money\Money;

class InMemoryProductRepository implements ProductRepository
{
    private array $products = [];

    public function __construct()
    {
        $this->add(Product::create(new CreateProductProps(
            ProductId::from('f81d4fae-7dec-11d0-a765-00a0c91e6bf9'),
            ProductName::from('Product A'),
            ProductDescription::from('Product description'),
            Money::EUR(1499),
            ProductStatus::DRAFT,
        )));
    }

    public function add(Product $product): void
    {
        $this->products[$product->id()->value()] = $product;
    }

    public function remove(Product $product): void
    {
        unset($this->products[$product->id()->value()]);
    }

    public function ofId(ProductId $id): ?Product
    {
        return $this->products[$id->value()] ?? null;
    }

    public function all(): array
    {
        return array_values($this->products);
    }
}
