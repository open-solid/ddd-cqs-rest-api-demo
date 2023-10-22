<?php

namespace App\Catalog\Product\Application\Find;

use App\Catalog\Product\Domain\Model\ProductId;
use App\Catalog\Product\Domain\View\ProductView;
use Yceruto\CqsBundle\Attribute\AsQueryHandler;

#[AsQueryHandler]
readonly class FindProductHandler
{
    public function __construct(private ProductFinder $finder)
    {
    }

    public function __invoke(FindProduct $query): ProductView
    {
        $product = $this->finder->findOne(ProductId::from($query->id));

        return ProductView::from($product);
    }
}
