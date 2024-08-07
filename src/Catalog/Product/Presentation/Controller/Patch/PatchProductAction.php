<?php

namespace App\Catalog\Product\Presentation\Controller\Patch;

use App\Catalog\Product\Application\Find\FindProduct;
use App\Catalog\Product\Application\Update\UpdateProduct;
use App\Catalog\Product\Presentation\View\ProductView;
use App\Shared\Presentation\OpenApi\Attribute\Id;
use OpenSolid\CqsBundle\Controller\CommandAction;
use OpenSolid\CqsBundle\Controller\CqsAction;
use OpenSolid\OpenApiBundle\Attribute\Body;
use OpenSolid\OpenApiBundle\Routing\Attribute\Patch;

class PatchProductAction extends CommandAction
{
    #[Patch(
        path: '/products/{id}',
        summary: 'Update a product partially',
        tags: ['Product'],
    )]
    public function __invoke(#[Id] string $id, #[Body] PatchProductBody $body): ProductView
    {
        $product = $this->commandBus()->execute(new UpdateProduct(
            $id,
            $body->name,
            $body->description,
            $body->price?->amount,
            $body->price?->currency,
            $body->status,
        ));

        return ProductView::from($product);
    }
}
