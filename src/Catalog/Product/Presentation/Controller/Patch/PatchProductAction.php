<?php

namespace App\Catalog\Product\Presentation\Controller\Patch;

use App\Catalog\Product\Application\Find\FindProduct;
use App\Catalog\Product\Application\Find\FindProductHandler;
use App\Catalog\Product\Application\Update\UpdateProduct;
use App\Catalog\Product\Application\Update\UpdateProductHandler;
use App\Catalog\Product\Domain\View\ProductView;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Yceruto\OpenApiBundle\Attributes\Path;
use Yceruto\OpenApiBundle\Attributes\Payload;
use Yceruto\OpenApiBundle\Routing\Attribute\Patch;

#[AsController]
class PatchProductAction
{
    #[Patch(
        path: '/products/{id}',
        summary: 'Update a product partially',
        tags: ['Product'],
    )]
    public function __invoke(
        #[Path(format: 'uuid')] string $id,
        #[Payload] PatchProductPayload $payload,
        FindProductHandler $findProductHandler,
        UpdateProductHandler $updateProductHandler,
    ): ProductView {
        $product = $findProductHandler->handle(new FindProduct($id));

        return $updateProductHandler->handle(new UpdateProduct(
            $id,
            $payload->name ?? $product->name,
            $payload->description ?? $product->description,
        ));
    }
}
