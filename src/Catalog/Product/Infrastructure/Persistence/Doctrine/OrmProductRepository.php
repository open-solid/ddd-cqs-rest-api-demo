<?php

namespace App\Catalog\Product\Infrastructure\Persistence\Doctrine;

use App\Catalog\Product\Domain\Model\Product;
use App\Catalog\Product\Domain\Model\ProductId;
use App\Catalog\Product\Domain\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;

readonly class OrmProductRepository implements ProductRepository
{
    public function __construct(private EntityManagerInterface $em)
    {
    }

    public function add(Product $product): void
    {
        $this->em->persist($product);
    }

    public function remove(Product $product): void
    {
        $this->em->remove($product);
    }

    public function ofId(ProductId $id): ?Product
    {
        return $this->em
            ->getRepository(Product::class)
            ->findOneBy(['id.value' => $id->value()]);
    }

    /**
     * @return list<Product>
     */
    public function all(): array
    {
        return $this->em
            ->getRepository(Product::class)
            ->findAll();
    }
}
