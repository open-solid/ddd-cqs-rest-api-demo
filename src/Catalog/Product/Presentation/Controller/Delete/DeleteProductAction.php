<?php

namespace App\Catalog\Product\Presentation\Controller\Delete;

use App\Catalog\Product\Application\Delete\DeleteProduct;
use App\Catalog\Product\Application\Delete\DeleteProductHandler;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Yceruto\OpenApiBundle\Attributes\Path;
use Yceruto\OpenApiBundle\Routing\Attribute\Delete;

#[AsController]
readonly class DeleteProductAction
{
    public function __construct(private DeleteProductHandler $deleteProductHandler)
    {
    }

    #[Delete(
        path: '/products/{id}',
        summary: 'Delete a product',
        tags: ['Product'],
        defaults: ['_format' => 'json']
    )]
    public function __invoke(#[Path(format: 'uuid')] string $id): void
    {
        $this->deleteProductHandler->handle(new DeleteProduct($id));
    }
}
