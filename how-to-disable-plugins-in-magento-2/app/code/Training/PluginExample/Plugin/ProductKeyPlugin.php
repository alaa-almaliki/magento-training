<?php

declare(strict_types=1);

namespace Training\PluginExample\Plugin;

use Training\PluginExample\Model\ProductKey;

class ProductKeyPlugin
{
    public function aroundGetKey(ProductKey $subject, callable $proceed, ...$args)
    {
        $result =  $proceed(...$args);
        $result .= ' dummy data here';
        return $result;
    }
}
