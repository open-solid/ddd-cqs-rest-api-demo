<?php

namespace App\Catalog\Product\Application\Create;

use App\Catalog\Product\Domain\Model\ProductDescription;
use App\Catalog\Product\Domain\Model\ProductId;
use App\Catalog\Product\Domain\Model\ProductName;
use App\Catalog\Product\Domain\Model\ProductStatus;
use App\Catalog\Product\Domain\Model\Props\CreateProductProps;
use App\Catalog\Product\Domain\View\ProductNewView;
use Money\Currency;
use Money\Money;
use OpenSolid\CqsBundle\Attribute\AsCommandHandler;

#[AsCommandHandler]
readonly class CreateProductHandler
{
    public function __construct(private ProductFactory $factory)
    {
    }

    public function __invoke(CreateProduct $command): ProductNewView
    {
        $product = $this->factory->create(new CreateProductProps(
            ProductId::from($command->id),
            ProductName::from($command->name),
            ProductDescription::from($command->description),
            new Money($command->priceAmount, new Currency($command->priceCurrency)),
            ProductStatus::from($command->status),
        ));

        return ProductNewView::from($product);
    }
}
