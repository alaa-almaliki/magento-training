<?php

declare(strict_types=1);

namespace Training\WarehouseManagement\Api;

use Magento\Framework\DataObject;

interface WarehouseRepositoryInterface
{
    public function newWarehouse(string $code): DataObject;
}
