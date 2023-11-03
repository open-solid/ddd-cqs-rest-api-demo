<?php

namespace App\Catalog\Product\Application\Update;

use App\Catalog\Product\Domain\Model\ProductDescription;
use App\Catalog\Product\Domain\Model\ProductId;
use App\Catalog\Product\Domain\Model\ProductName;
use App\Catalog\Product\Domain\Model\ProductStatus;
use App\Catalog\Product\Domain\View\ProductView;
use Yceruto\CqsBundle\Attribute\AsCommandHandler;

#[AsCommandHandler]
readonly class UpdateProductHandler
{
    public function __construct(private ProductUpdater $updater)
    {
    }

    public function __invoke(UpdateProduct $command): ProductView
    {
        $product = $this->updater->update(
            ProductId::from($command->id),
            ProductName::from($command->name),
            ProductDescription::from($command->description),
            ProductStatus::from($command->status),
        );

        return ProductView::from($product);
    }
}
