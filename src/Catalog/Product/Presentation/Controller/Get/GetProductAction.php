<?php

namespace App\Catalog\Product\Presentation\Controller\Get;

use App\Catalog\Product\Application\Find\FindProduct;
use App\Catalog\Product\Domain\View\ProductView;
use Yceruto\CqsBundle\Controller\QueryAction;
use Yceruto\OpenApiBundle\Attributes\Path;
use Yceruto\OpenApiBundle\Routing\Attribute\Get;

class GetProductAction extends QueryAction
{
    #[Get(
        path: '/products/{id}',
        summary: 'Get a product',
        tags: ['Product'],
    )]
    public function __invoke(#[Path(format: 'uuid')] string $id): ProductView
    {
        return $this->queryBus()->ask(new FindProduct($id));
    }
}
