<?php

namespace App\Catalog\Product\Presentation\Controller\Get;

use App\Catalog\Product\Application\Find\FindProducts;
use App\Catalog\Product\Domain\View\ProductListItemView;
use Yceruto\CqsBundle\Controller\QueryAction;
use Yceruto\OpenApiBundle\Attribute\Query;
use Yceruto\OpenApiBundle\Routing\Attribute\Get;

class GetProductsAction extends QueryAction
{
    #[Get(
        path: '/products',
        summary: 'Get a collection of products',
        tags: ['Product'],
        itemsType: ProductListItemView::class,
    )]
    public function __invoke(#[Query] GetProductsQuery $query = null): array
    {
        return $this->queryBus()->ask(new FindProducts($query?->name));
    }
}
