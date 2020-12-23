<?php

declare(strict_types=1);

namespace Training\ReplaceConstructorArguments\Model;

class UpperCaseName extends DefaultName
{
    public function getName(): string
    {
        return strtoupper(parent::getName());
    }
}
