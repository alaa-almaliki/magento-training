<?php

declare(strict_types=1);

namespace Training\Interfaces\Model;

interface CodeValidationInterface
{
    public function validate(string $code): void;
}
