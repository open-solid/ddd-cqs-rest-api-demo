<?php

namespace App\Catalog\Product\Presentation\Controller\Delete;

use App\Catalog\Product\Application\Delete\DeleteProduct;
use App\Catalog\Product\Application\Delete\DeleteProductHandler;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Yceruto\OpenApiBundle\Attributes\Path;
use Yceruto\OpenApiBundle\Routing\Attribute\Delete;

#[AsController]
class DeleteProductAction
{
    #[Delete(
        path: '/products/{id}',
        summary: 'Delete a product',
        tags: ['Product'],
        defaults: ['_format' => 'json']
    )]
    public function __invoke(#[Path(format: 'uuid')] string $id, DeleteProductHandler $deleteProductHandler): void
    {
        $deleteProductHandler->handle(new DeleteProduct($id));
    }
}
