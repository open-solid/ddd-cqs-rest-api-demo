<?php

namespace App\Catalog\Product\Presentation\Controller\Delete;

use App\Catalog\Product\Application\Delete\DeleteProduct;
use App\Shared\Presentation\OpenApi\Attribute\Id;
use Yceruto\CqsBundle\Controller\CommandAction;
use OpenSolid\OpenApiBundle\Routing\Attribute\Delete;

class DeleteProductAction extends CommandAction
{
    #[Delete(
        path: '/products/{id}',
        summary: 'Delete a product',
        tags: ['Product'],
        defaults: ['_format' => 'json'],
    )]
    public function __invoke(#[Id] string $id): void
    {
        $this->commandBus()->execute(new DeleteProduct($id));
    }
}
