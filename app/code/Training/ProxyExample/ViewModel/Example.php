<?php

declare(strict_types=1);

namespace Training\ProxyExample\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Training\ProxyExample\Model\FeaturedProducts;

class Example implements ArgumentInterface
{
    /**
     * @var FeaturedProducts
     */
    protected FeaturedProducts $featuredProducts;

    public function __construct(FeaturedProducts $featuredProducts)
    {
        $this->featuredProducts = $featuredProducts;
    }

    public function getFeaturedProducts(): array
    {
        return $this->featuredProducts->getFeaturedProducts();
    }
}
