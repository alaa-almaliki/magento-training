<?php

declare(strict_types=1);

namespace Training\ProxyExample\Model\FeaturedProducts;

class FeaturedBySales implements FeaturedProductsInterface
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
            'Sales_1',
            'Sales_2',
            'Sales_3',
            'Sales_4',
            'Sales_5',
            'Sales_6',
        ];
    }
}
