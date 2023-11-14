<?php

namespace App\Catalog\Product\Presentation\Controller\Put;

use App\Catalog\Product\Application\Update\UpdateProduct;
use App\Catalog\Product\Domain\View\ProductView;
use App\Shared\Presentation\OpenApi\Attribute\Id;
use Yceruto\CqsBundle\Controller\CommandAction;
use Yceruto\OpenApiBundle\Attribute\Body;
use Yceruto\OpenApiBundle\Routing\Attribute\Put;

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
