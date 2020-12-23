<?php

declare(strict_types=1);

namespace Training\Interfaces\Model;

use Training\Interfaces\Api\Data\SupplierInterface;

class Supplier implements SupplierInterface
{
    protected string $code;

    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function getCode(): string
    {
        return $this->code;
    }
}
