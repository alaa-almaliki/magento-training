<?php

declare(strict_types=1);

namespace Training\PoolPattern\Model;

use Training\PoolPattern\Model\CodeValidationInterface;

class CodeLengthValidation implements CodeValidationInterface
{
    public function validate(string $code): void
    {
        if (strlen($code) > 10) {
            throw new \InvalidArgumentException('Code must not be more than 10 characters');
        }
    }
}
