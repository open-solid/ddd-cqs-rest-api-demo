<?php

namespace App\Catalog\Product\Presentation\Controller\Delete;

use App\Catalog\Product\Application\Delete\DeleteProduct;
use Yceruto\CqsBundle\Controller\CommandAction;
use Yceruto\OpenApiBundle\Attribute\Path;
use Yceruto\OpenApiBundle\Routing\Attribute\Delete;

class DeleteProductAction extends CommandAction
{
    #[Delete(
        path: '/products/{id}',
        summary: 'Delete a product',
        tags: ['Product'],
        defaults: ['_format' => 'json'],
    )]
    public function __invoke(#[Path(example: 'f81d4fae-7dec-11d0-a765-00a0c91e6bf9', format: 'uuid')] string $id): void
    {
        $this->commandBus()->execute(new DeleteProduct($id));
    }
}
