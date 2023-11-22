<?php

namespace App\Catalog\Product\Infrastructure\Persistence\Doctrine;

use App\Catalog\Product\Domain\Model\Product;
use App\Catalog\Product\Domain\Model\ProductId;
use App\Catalog\Product\Domain\Repository\ProductRepository;
use Doctrine\Persistence\ObjectManager;

readonly class DoctrineProductRepository implements ProductRepository
{
    public function __construct(private ObjectManager $om)
    {
    }

    public function add(Product $product): void
    {
        $this->om->persist($product);
    }

    public function remove(Product $product): void
    {
        $this->om->remove($product);
    }

    public function ofId(ProductId $id): ?Product
    {
        return $this->om
            ->getRepository(Product::class)
            ->findOneBy(['id.value' => $id->value()]);
    }

    /**
     * @return list<Product>
     */
    public function all(): array
    {
        return $this->om
            ->getRepository(Product::class)
            ->findAll();
    }
}
