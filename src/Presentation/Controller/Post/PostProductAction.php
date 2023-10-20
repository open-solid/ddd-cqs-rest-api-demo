<?php

namespace App\Presentation\Controller\Post;

use App\Application\Create\CreateProductCase;
use App\Application\Create\CreateProductRequest;
use App\Domain\Model\ProductId;
use App\Domain\View\ProductView;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Yceruto\OpenApiBundle\Attributes\Payload;
use Yceruto\OpenApiBundle\Routing\Attribute\Post;

#[AsController]
readonly class PostProductAction
{
    public function __construct(private CreateProductCase $createProductCase)
    {
    }

    #[Post(
        path: '/products',
        summary: 'Create a product',
        tags: ['Product'],
    )]
    public function __invoke(#[Payload] PostProductPayload $payload): ProductView
    {
        return $this->createProductCase->execute(new CreateProductRequest(
            $payload->id ?? ProductId::generate(),
            $payload->name,
            $payload->description,
        ));
    }
}
