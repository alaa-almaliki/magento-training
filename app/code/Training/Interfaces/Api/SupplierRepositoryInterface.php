<?php

declare(strict_types=1);

namespace Training\Interfaces\Api;

use Training\Interfaces\Api\Data\SupplierInterface;

interface SupplierRepositoryInterface
{
    public function createNew(string $code): SupplierInterface;
}
