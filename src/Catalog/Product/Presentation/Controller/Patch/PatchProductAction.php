<?php

namespace App\Catalog\Product\Presentation\Controller\Patch;

use App\Catalog\Product\Application\Find\FindProduct;
use App\Catalog\Product\Application\Update\UpdateProduct;
use App\Catalog\Product\Domain\View\ProductView;
use Yceruto\CqsBundle\Controller\CqsAction;
use Yceruto\OpenApiBundle\Attribute\Path;
use Yceruto\OpenApiBundle\Attribute\Body;
use Yceruto\OpenApiBundle\Routing\Attribute\Patch;

class PatchProductAction extends CqsAction
{
    #[Patch(
        path: '/products/{id}',
        summary: 'Update a product partially',
        tags: ['Product'],
    )]
    public function __invoke(
        #[Path(example: 'f81d4fae-7dec-11d0-a765-00a0c91e6bf9', format: 'uuid')] string $id,
        #[Body] PatchProductBody $body,
    ): ProductView {
        $product = $this->queryBus()->ask(new FindProduct($id));

        return $this->commandBus()->execute(new UpdateProduct(
            $id,
            $body->name ?? $product->name,
            $body->description ?? $product->description,
            $body->price?->amount ?? $product->price->amount,
            $body->price?->currency ?? $product->price->currency,
            $body->status ?? $product->status->value,
        ));
    }
}
