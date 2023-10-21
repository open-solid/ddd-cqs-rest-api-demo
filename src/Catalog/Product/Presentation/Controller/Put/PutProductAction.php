<?php

namespace App\Catalog\Product\Presentation\Controller\Put;

use App\Catalog\Product\Application\Update\UpdateProduct;
use App\Catalog\Product\Application\Update\UpdateProductHandler;
use App\Catalog\Product\Domain\View\ProductView;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Yceruto\OpenApiBundle\Attributes\Path;
use Yceruto\OpenApiBundle\Attributes\Payload;
use Yceruto\OpenApiBundle\Routing\Attribute\Put;

#[AsController]
readonly class PutProductAction
{
    public function __construct(private UpdateProductHandler $updateProductHandler)
    {
    }

    #[Put(
        path: '/products/{id}',
        summary: 'Update a product',
        tags: ['Product'],
    )]
    public function __invoke(#[Path(format: 'uuid')] string $id, #[Payload] PutProductPayload $payload): ProductView
    {
        return $this->updateProductHandler->handle(new UpdateProduct(
            $id,
            $payload->name,
            $payload->description,
        ));
    }
}
