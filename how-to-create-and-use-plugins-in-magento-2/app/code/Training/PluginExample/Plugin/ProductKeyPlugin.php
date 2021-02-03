<?php

declare(strict_types=1);

namespace Training\PluginExample\Plugin;

use Magento\Catalog\Api\Data\ProductInterface;
use Training\PluginExample\Model\ProductKey;

class ProductKeyPlugin
{
//    public function beforeGetKey(ProductKey $subject, ProductInterface $product, string $prefix = 'item')
//    {
//        $prefix = $product->getId() . '-'  . $prefix;
//        return [$product, $prefix];
//    }

//    public function afterGetKey(ProductKey $subject, $result, ProductInterface $product, string $prefix = 'item')
//    {
//        return $result . ' ' . $product->getName();
//    }

    public function aroundGetKey(ProductKey $subject, callable $proceed, ...$args)
    {
        $result =  $proceed(...$args);
        $result .= ' Item';
        return $result;
    }
}
