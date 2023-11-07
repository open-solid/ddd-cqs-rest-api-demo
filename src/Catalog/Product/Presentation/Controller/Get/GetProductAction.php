<?php

namespace App\Catalog\Product\Presentation\Controller\Get;

use App\Catalog\Product\Application\Find\FindProduct;
use App\Catalog\Product\Domain\View\ProductView;
use Yceruto\CqsBundle\Controller\QueryAction;
use Yceruto\OpenApiBundle\Attribute\Path;
use Yceruto\OpenApiBundle\Routing\Attribute\Get;

class GetProductAction extends QueryAction
{
    #[Get(
        path: '/products/{id}',
        summary: 'Get a product',
        tags: ['Product'],
    )]
    public function __invoke(
        #[Path(example: 'f81d4fae-7dec-11d0-a765-00a0c91e6bf9', format: 'uuid')] string $id,
    ): ProductView {
        return $this->queryBus()->ask(new FindProduct($id));
    }
}
