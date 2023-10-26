<?php

namespace App\Catalog\Product\Presentation\Controller\Put;

use App\Catalog\Product\Application\Update\UpdateProduct;
use App\Catalog\Product\Domain\View\ProductView;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Yceruto\CqsBundle\Controller\CommandAction;
use Yceruto\OpenApiBundle\Attribute\Path;
use Yceruto\OpenApiBundle\Attribute\Payload;
use Yceruto\OpenApiBundle\Routing\Attribute\Put;

#[AsController]
class PutProductAction extends CommandAction
{
    #[Put(
        path: '/products/{id}',
        summary: 'Update a product',
        tags: ['Product'],
    )]
    public function __invoke(#[Path(format: 'uuid')] string $id, #[Payload] PutProductPayload $payload): ProductView
    {
        return $this->commandBus()->execute(new UpdateProduct(
            $id,
            $payload->name,
            $payload->description,
        ));
    }
}
