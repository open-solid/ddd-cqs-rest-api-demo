<?php

namespace App\Catalog\Product\Presentation\Controller\Post;

use App\Catalog\Product\Application\Create\CreateProduct;
use App\Catalog\Product\Domain\Model\ProductId;
use App\Catalog\Product\Domain\View\ProductNewView;
use Yceruto\CqsBundle\Controller\CommandAction;
use Yceruto\OpenApiBundle\Attribute\Payload;
use Yceruto\OpenApiBundle\Routing\Attribute\Post;

class PostProductAction extends CommandAction
{
    #[Post(
        path: '/products',
        summary: 'Create a product',
        tags: ['Product'],
    )]
    public function __invoke(#[Payload] PostProductPayload $payload): ProductNewView
    {
        return $this->commandBus()->execute(new CreateProduct(
            $payload->id ?? ProductId::generate(),
            $payload->name,
            $payload->description,
            $payload->status,
        ));
    }
}
