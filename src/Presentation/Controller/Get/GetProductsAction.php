<?php

namespace App\Presentation\Controller\Get;

use App\Application\Find\SearchProductsCase;
use App\Domain\View\ProductView;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Yceruto\OpenApiBundle\Routing\Attribute\Get;

#[AsController]
readonly class GetProductsAction
{
    public function __construct(private SearchProductsCase $searchProductsCase)
    {
    }

    #[Get(
        path: '/products',
        summary: 'Get a collection of products',
        tags: ['Product'],
        itemsType: ProductView::class,
    )]
    public function __invoke(): array
    {
        return $this->searchProductsCase->execute();
    }
}
