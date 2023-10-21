<?php

namespace App\Catalog\Product\Presentation\Controller\Get;

use App\Catalog\Product\Application\Find\FindProducts;
use App\Catalog\Product\Application\Find\FindProductsHandler;
use App\Catalog\Product\Domain\View\ProductListItemView;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Yceruto\OpenApiBundle\Routing\Attribute\Get;

#[AsController]
class GetProductsAction
{
    #[Get(
        path: '/products',
        summary: 'Get a collection of products',
        tags: ['Product'],
        itemsType: ProductListItemView::class,
    )]
    public function __invoke(FindProductsHandler $findProductsHandler): array
    {
        return $findProductsHandler->handle(new FindProducts());
    }
}
