<?php

namespace App\Catalog\Product\Presentation\Controller\Get;

use App\Catalog\Product\Application\Find\FindProduct;
use App\Catalog\Product\Domain\View\ProductView;
use App\Shared\Presentation\OpenApi\Attribute\Id;
use OpenSolid\CqsBundle\Controller\QueryAction;
use OpenSolid\OpenApiBundle\Routing\Attribute\Get;

class GetProductAction extends QueryAction
{
    #[Get(
        path: '/products/{id}',
        summary: 'Get a product',
        tags: ['Product'],
    )]
    public function __invoke(#[Id] string $id): ProductView
    {
        return $this->queryBus()->ask(new FindProduct($id));
    }
}
