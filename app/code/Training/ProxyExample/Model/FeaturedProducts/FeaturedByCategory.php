<?php

declare(strict_types=1);

namespace Training\ProxyExample\Model\FeaturedProducts;

class FeaturedByCategory implements FeaturedProductsInterface
{
    protected array $featuredProducts = [];

    public function __construct()
    {
        $this->loadFeaturedProducts();
    }

    public function getFeaturedProducts(): array
    {
        return $this->featuredProducts;
    }

    public function count(): int
    {
        return count($this->featuredProducts);
    }

    protected function loadFeaturedProducts(): void
    {
        $this->featuredProducts = [
            'Product_1',
            'Product_2',
            'Product_3',
            'Product_4',
            'Product_5',
            'Product_6',
        ];
    }
}
