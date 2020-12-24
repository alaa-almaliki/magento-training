<?php

declare(strict_types=1);

namespace Training\PoolPattern\Model;

interface CodeValidationInterface
{
    public function validate(string $code): void;
}
