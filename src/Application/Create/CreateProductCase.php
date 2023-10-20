<?php

namespace App\Application\Create;

use App\Domain\Model\ProductDescription;
use App\Domain\Model\ProductId;
use App\Domain\Model\ProductName;
use App\Domain\View\ProductNewView;

readonly class CreateProductCase
{
    public function __construct(private ProductFactory $factory)
    {
    }

    public function execute(CreateProductRequest $request): ProductNewView
    {
        $product = $this->factory->create(
            ProductId::from($request->id),
            ProductName::from($request->name),
            ProductDescription::from($request->description),
        );

        return ProductNewView::from($product);
    }
}
