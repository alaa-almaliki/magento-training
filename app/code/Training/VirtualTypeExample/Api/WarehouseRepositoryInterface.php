<?php

declare(strict_types=1);

namespace Training\VirtualTypeExample\Api;

use Magento\Framework\DataObject;

interface WarehouseRepositoryInterface
{
    public function newWarehouse(string $code): DataObject;
}
