<?php

namespace App\Catalog\Product\Presentation\Controller\Put;

use App\Catalog\Product\Application\Update\UpdateProduct;
use App\Catalog\Product\Presentation\View\ProductView;
use App\Shared\Presentation\OpenApi\Attribute\Id;
use OpenSolid\CqsBundle\Controller\CommandAction;
use OpenSolid\OpenApiBundle\Attribute\Body;
use OpenSolid\OpenApiBundle\Routing\Attribute\Put;

class PutProductAction extends CommandAction
{
    #[Put(
        path: '/products/{id}',
        summary: 'Update a product',
        tags: ['Product'],
    )]
    public function __invoke(#[Id] string $id, #[Body] PutProductBody $body): ProductView
    {
        return $this->commandBus()->execute(new UpdateProduct(
            $id,
            $body->name,
            $body->description,
            $body->price->amount,
            $body->price->currency,
            $body->status,
        ));
    }
}
