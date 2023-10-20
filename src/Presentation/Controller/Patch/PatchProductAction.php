<?php

namespace App\Presentation\Controller\Patch;

use App\Application\Find\FindProductCase;
use App\Application\Find\FindProductRequest;
use App\Application\Update\UpdateProductCase;
use App\Application\Update\UpdateProductRequest;
use App\Domain\View\ProductView;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Yceruto\OpenApiBundle\Attributes\Path;
use Yceruto\OpenApiBundle\Attributes\Payload;
use Yceruto\OpenApiBundle\Routing\Attribute\Patch;

#[AsController]
readonly class PatchProductAction
{
    public function __construct(
        private FindProductCase $findProductCase,
        private UpdateProductCase $updateProductCase,
    ) {
    }

    #[Patch(
        path: '/products/{id}',
        summary: 'Update a product partially',
        tags: ['Product'],
    )]
    public function __invoke(#[Path(format: 'uuid')] string $id, #[Payload] PatchProductPayload $payload): ProductView
    {
        $product = $this->findProductCase->execute(new FindProductRequest($id));

        return $this->updateProductCase->execute(new UpdateProductRequest(
            $id,
            $payload->name ?? $product->name,
            $payload->description ?? $product->description,
        ));
    }
}
