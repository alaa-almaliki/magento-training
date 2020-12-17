<?php

declare(strict_types=1);

namespace Training\DependencyExample\Model\VirtualType;

class UpperCaseName extends Name
{
    public function getName(string $name): string
    {
        return strtoupper(parent::getName($name));
    }
}
