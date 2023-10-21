<?php

namespace App\Catalog\Product\Presentation\Controller\Post;

use App\Catalog\Product\Application\Create\CreateProduct;
use App\Catalog\Product\Application\Create\CreateProductHandler;
use App\Catalog\Product\Domain\Model\ProductId;
use App\Catalog\Product\Domain\View\ProductNewView;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Yceruto\OpenApiBundle\Attributes\Payload;
use Yceruto\OpenApiBundle\Routing\Attribute\Post;

#[AsController]
class PostProductAction
{
    #[Post(
        path: '/products',
        summary: 'Create a product',
        tags: ['Product'],
    )]
    public function __invoke(#[Payload] PostProductPayload $payload, CreateProductHandler $createProductHandler): ProductNewView
    {
        return $createProductHandler->handle(new CreateProduct(
            $payload->id ?? ProductId::generate(),
            $payload->name,
            $payload->description,
        ));
    }
}
