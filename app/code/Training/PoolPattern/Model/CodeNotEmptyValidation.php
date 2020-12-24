<?php

declare(strict_types=1);

namespace Training\PoolPattern\Model;

class CodeNotEmptyValidation implements CodeValidationInterface
{
    public function validate(string $code): void
    {
        if ($code === '') {
            throw new \InvalidArgumentException('Code can not be empty.');
        }
    }
}
