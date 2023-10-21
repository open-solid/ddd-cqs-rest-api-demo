<?php

namespace App\Catalog\Product\Presentation\Controller\Delete;

use App\Catalog\Product\Application\Delete\DeleteProduct;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Yceruto\CqsBundle\Controller\CommandAction;
use Yceruto\OpenApiBundle\Attributes\Path;
use Yceruto\OpenApiBundle\Routing\Attribute\Delete;

#[AsController]
class DeleteProductAction extends CommandAction
{
    #[Delete(
        path: '/products/{id}',
        summary: 'Delete a product',
        tags: ['Product'],
        defaults: ['_format' => 'json']
    )]
    public function __invoke(#[Path(format: 'uuid')] string $id): void
    {
        $this->commandBus()->execute(new DeleteProduct($id));
    }
}
