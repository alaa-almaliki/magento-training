<?php

declare(strict_types=1);

namespace Training\VirtualTypeExample2\Model;

class WarehouseManagementExtended extends \Training\WarehouseManagement\Model\WarehouseManagement
{
    protected function getAllWarehouses(): array
    {
        $extraWarehouses = [
            'man1' => [
                'name' => 'Manchester',
                'code' => 'man1',
                'postcode' => 'XYZ123'
            ],
            'birm1' => [
                'name' => 'Birmingham',
                'code' => 'birm1',
                'postcode' => 'BIR10'
            ]
        ];

        return array_merge(parent::getAllWarehouses(), $extraWarehouses);
    }

    /**
     * @return string[]
     */
    public function getDiscontinuedWarehouses(): array
    {
        return [
            'lon1'
        ];
    }
}
