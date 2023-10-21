<?php

namespace App\Catalog\Product\Presentation\Controller\Get;

use App\Catalog\Product\Application\Find\FindProduct;
use App\Catalog\Product\Application\Find\FindProductHandler;
use App\Catalog\Product\Domain\View\ProductView;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Yceruto\OpenApiBundle\Attributes\Path;
use Yceruto\OpenApiBundle\Routing\Attribute\Get;

#[AsController]
class GetProductAction
{
    #[Get(
        path: '/products/{id}',
        summary: 'Get a product',
        tags: ['Product'],
    )]
    public function __invoke(#[Path(format: 'uuid')] string $id, FindProductHandler $findProductHandler): ProductView
    {
        return $findProductHandler->handle(new FindProduct($id));
    }
}
