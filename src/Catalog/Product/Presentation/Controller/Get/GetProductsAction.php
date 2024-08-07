<?php

namespace App\Catalog\Product\Presentation\Controller\Get;

use App\Catalog\Product\Application\Find\FindProducts;
use App\Catalog\Product\Presentation\View\ProductListItemView;
use OpenSolid\CqsBundle\Controller\QueryAction;
use OpenSolid\OpenApiBundle\Attribute\Query;
use OpenSolid\OpenApiBundle\Routing\Attribute\Get;

class GetProductsAction extends QueryAction
{
    #[Get(
        path: '/products',
        summary: 'Get a collection of products',
        tags: ['Product'],
        itemsType: ProductListItemView::class,
    )]
    public function __invoke(#[Query] GetProductsParams $params = null): array
    {
        $products = $this->queryBus()->ask(new FindProducts($params?->sort));

        return ProductListItemView::fromMany($products);
    }
}
