<?php

declare(strict_types=1);

namespace Training\VirtualTypeExample2\Model;

use Magento\Framework\DataObject;
use Training\WarehouseManagement\Api\WarehouseManagementInterface;

class WarehouseRepository extends \Training\WarehouseManagement\Model\WarehouseRepository
{
    public function __construct(WarehouseManagementExtended $warehouseManagement)
    {
        parent::__construct($warehouseManagement);
    }

    public function newWarehouse(string $code): DataObject
    {
        if (in_array($code, $this->warehouseManagement->getDiscontinuedWarehouses())) {
            throw new \Exception('warehouse is no longer exists');
        }
        return parent::newWarehouse($code);
    }
}
