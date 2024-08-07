<?php

namespace App\Catalog\Product\Application\Update;

use App\Catalog\Product\Domain\Model\Product;
use App\Catalog\Product\Domain\Model\ProductDescription;
use App\Catalog\Product\Domain\Model\ProductId;
use App\Catalog\Product\Domain\Model\ProductName;
use App\Catalog\Product\Domain\Model\ProductStatus;
use App\Catalog\Product\Domain\Model\Props\UpdateProductProps;
use Money\Currency;
use Money\Money;
use OpenSolid\CqsBundle\Attribute\AsCommandHandler;

#[AsCommandHandler]
readonly class UpdateProductHandler
{
    public function __construct(
        private ProductUpdater $updater,
    ) {
    }

    public function __invoke(UpdateProduct $command): Product
    {
        return $this->updater->update(
            ProductId::from($command->id),
            new UpdateProductProps(
                $command->name ? ProductName::from($command->name) : null,
                $command->description ? ProductDescription::from($command->description): null,
                null !== $command->priceAmount && $command->priceCurrency ? new Money($command->priceAmount, new Currency($command->priceCurrency)) : null,
                $command->status ? ProductStatus::from($command->status) : null,
            ),
        );
    }
}
