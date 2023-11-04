<?php

namespace App\Catalog\Product\Application\Update;

use App\Catalog\Product\Domain\Model\ProductDescription;
use App\Catalog\Product\Domain\Model\ProductId;
use App\Catalog\Product\Domain\Model\ProductName;
use App\Catalog\Product\Domain\Model\ProductStatus;
use App\Catalog\Product\Domain\Model\Props\UpdateProductProps;
use App\Catalog\Product\Domain\View\ProductView;
use Money\Currency;
use Money\Money;
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
            new UpdateProductProps(
                ProductName::from($command->name),
                ProductDescription::from($command->description),
                new Money($command->priceAmount, new Currency($command->priceCurrency)),
                ProductStatus::from($command->status),
            ),
        );

        return ProductView::from($product);
    }
}
