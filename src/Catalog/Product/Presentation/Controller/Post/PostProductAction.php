<?php

namespace App\Catalog\Product\Presentation\Controller\Post;

use App\Catalog\Product\Application\Create\CreateProduct;
use App\Catalog\Product\Domain\Model\ProductId;
use App\Catalog\Product\Domain\View\ProductNewView;
use OpenSolid\CqsBundle\Controller\CommandAction;
use OpenSolid\OpenApiBundle\Attribute\Body;
use OpenSolid\OpenApiBundle\Routing\Attribute\Post;

class PostProductAction extends CommandAction
{
    #[Post(
        path: '/products',
        summary: 'Create a product',
        tags: ['Product'],
    )]
    public function __invoke(#[Body] PostProductBody $body): ProductNewView
    {
        return $this->commandBus()->execute(new CreateProduct(
            $body->id ?? ProductId::generate(),
            $body->name,
            $body->description,
            $body->price->amount,
            $body->price->currency,
            $body->status,
        ));
    }
}
