<?php

namespace App\Presentation\Controller\Put;

use App\Application\Update\UpdateProductCase;
use App\Application\Update\UpdateProductRequest;
use App\Domain\View\ProductView;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Yceruto\OpenApiBundle\Attributes\Path;
use Yceruto\OpenApiBundle\Attributes\Payload;
use Yceruto\OpenApiBundle\Routing\Attribute\Put;

#[AsController]
readonly class PutProductAction
{
    public function __construct(private UpdateProductCase $updateProductCase)
    {
    }

    #[Put(
        path: '/products/{id}',
        summary: 'Update a product',
        tags: ['Product'],
    )]
    public function __invoke(#[Path(format: 'uuid')] string $id, #[Payload] PutProductPayload $payload): ProductView
    {
        return $this->updateProductCase->execute(new UpdateProductRequest(
            $id,
            $payload->name,
            $payload->description,
        ));
    }
}
