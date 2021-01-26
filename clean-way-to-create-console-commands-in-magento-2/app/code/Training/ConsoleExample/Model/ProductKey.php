<?php

declare(strict_types=1);

namespace Training\ConsoleExample\Model;

use Magento\Catalog\Api\Data\ProductInterface;

class ProductKey
{
    public function getKey(ProductInterface $product, string $prefix): string
    {
        return sprintf('%s-%s', $prefix, $product->getSku());
    }
}
