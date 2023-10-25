<?php

namespace App\Catalog\Product\Presentation\Controller\Patch;

use App\Catalog\Product\Application\Find\FindProduct;
use App\Catalog\Product\Application\Update\UpdateProduct;
use App\Catalog\Product\Domain\View\ProductView;
use Yceruto\CqsBundle\Controller\CqsAction;
use Yceruto\OpenApiBundle\Attributes\Path;
use Yceruto\OpenApiBundle\Attributes\Payload;
use Yceruto\OpenApiBundle\Routing\Attribute\Patch;

class PatchProductAction extends CqsAction
{
    #[Patch(
        path: '/products/{id}',
        summary: 'Update a product partially',
        tags: ['Product'],
    )]
    public function __invoke(#[Path(format: 'uuid')] string $id, #[Payload] PatchProductPayload $payload): ProductView
    {
        $product = $this->queryBus()->ask(new FindProduct($id));

        return $this->commandBus()->execute(new UpdateProduct(
            $id,
            $payload->name ?? $product->name,
            $payload->description ?? $product->description,
        ));
    }
}
