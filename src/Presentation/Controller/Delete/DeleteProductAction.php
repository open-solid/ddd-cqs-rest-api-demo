<?php

namespace App\Presentation\Controller\Delete;

use App\Application\Delete\DeleteProductCase;
use App\Application\Delete\DeleteProductRequest;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Yceruto\OpenApiBundle\Attributes\Path;
use Yceruto\OpenApiBundle\Routing\Attribute\Delete;

#[AsController]
readonly class DeleteProductAction
{
    public function __construct(private DeleteProductCase $deleteProductCase)
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
        $this->deleteProductCase->execute(new DeleteProductRequest($id));
    }
}
