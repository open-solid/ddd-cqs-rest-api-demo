<?php

namespace App\Presentation\Controller\Get;

use App\Application\Find\FindProductCase;
use App\Application\Find\FindProductRequest;
use App\Domain\View\ProductView;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Yceruto\OpenApiBundle\Attributes\Path;
use Yceruto\OpenApiBundle\Routing\Attribute\Get;

#[AsController]
readonly class GetProductAction
{
    public function __construct(private FindProductCase $findProductCase)
    {
    }

    #[Get(
        path: '/products/{id}',
        summary: 'Get a product',
        tags: ['Product'],
    )]
    public function __invoke(#[Path(format: 'uuid')] string $id): ProductView
    {
        return $this->findProductCase->execute(new FindProductRequest($id));
    }
}
