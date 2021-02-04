<?php

declare(strict_types=1);

namespace Training\PluginExample\Model;

use Magento\Catalog\Api\Data\ProductInterface;

/**
 * Class ProductKey
 *
 * @package Training\PluginExample\Model
 */
class ProductKey
{
    public function getKey(ProductInterface $product, string $prefix = 'Item'): string
    {
        return sprintf('%s : %s', $prefix, $product->getSku());
    }
}
