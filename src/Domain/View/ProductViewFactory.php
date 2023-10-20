<?php

namespace App\Domain\View;

use App\Domain\Model\Product;

trait ProductViewFactory
{
    /**
     * @param array<Product> $products
     *
     * @return array<self>
     */
    public static function fromMany(array $products): array
    {
        return array_map(self::from(...), $products);
    }

    public static function from(Product $product): self
    {
        return new self($product);
    }
}
