<?php

declare(strict_types=1);

namespace Training\Preferences\Model;

use Training\Preferences\Api\Data\ItemInterface;

class Item implements ItemInterface
{
    protected string $code;

    public function setCode(string $code): ItemInterface
    {
        $this->code = $code;
        return $this;
    }

    public function getCode(): string
    {
        $whs = $this->getWarehouses();
        $whLength = count($whs);
        $id = random_int(0, $whLength - 1);
        $whCode = $this->getWarehouses()[$id];

        return $whCode . '_' . $this->code;
    }

    protected function getWarehouses(): array
    {
        return [
            'LON',
            'MAN',
            'BIRM'
        ];
    }
}
