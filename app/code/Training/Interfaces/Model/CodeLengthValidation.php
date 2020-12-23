<?php

declare(strict_types=1);

namespace Training\Interfaces\Model;

class CodeLengthValidation implements CodeValidationInterface
{

    public function validate(string $code): void
    {
        if (strlen($code) > 9) {
            throw new \InvalidArgumentException('Code must not be more than 9 characters.');
        }
    }
}
