<?php

declare(strict_types=1);

namespace Training\WarehouseManagement\Model;

use Training\WarehouseManagement\Api\WarehouseManagementInterface;

class WarehouseManagement implements WarehouseManagementInterface
{

    public function getWarehouseInfo(string $code): array
    {
        $warehouses = $this->getAllWarehouses();

        if (array_key_exists($code, $warehouses)) {
            return $warehouses[$code];
        }

        return [];
    }

    protected function getAllWarehouses(): array
    {
        return [
            'lon1' => [
                'name' => 'London',
                'code' => 'lon1',
                'postcode' => 'ABC111'
            ],
            'lon2' => [
                'name' => 'London',
                'code' => 'lon2',
                'postcode' => 'DEF222'
            ],
            'lon3' => [
                'name' => 'London',
                'code' => 'lon3',
                'postcode' => 'GHI333'
            ],
        ];
    }
}
