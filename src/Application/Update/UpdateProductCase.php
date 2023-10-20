<?php

namespace App\Application\Update;

use App\Domain\Model\ProductDescription;
use App\Domain\Model\ProductId;
use App\Domain\Model\ProductName;
use App\Domain\View\ProductView;

readonly class UpdateProductCase
{
    public function __construct(private ProductUpdater $updater)
    {
    }

    public function execute(UpdateProductRequest $request): ProductView
    {
        $product = $this->updater->update(
            ProductId::from($request->id),
            ProductName::from($request->name),
            ProductDescription::from($request->description),
        );

        return ProductView::from($product);
    }
}
