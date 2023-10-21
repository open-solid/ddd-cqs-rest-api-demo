<?php

namespace App\Catalog\Product\Application\Create;

use App\Catalog\Product\Domain\Model\ProductDescription;
use App\Catalog\Product\Domain\Model\ProductId;
use App\Catalog\Product\Domain\Model\ProductName;
use App\Catalog\Product\Domain\View\ProductNewView;

readonly class CreateProductHandler
{
    public function __construct(private ProductFactory $factory)
    {
    }

    public function handle(CreateProduct $command): ProductNewView
    {
        $product = $this->factory->create(
            ProductId::from($command->id),
            ProductName::from($command->name),
            ProductDescription::from($command->description),
        );

        return ProductNewView::from($product);
    }
}