<?php

declare(strict_types=1);

namespace Training\DependencyExample\Model\VirtualType;

class Name
{
    public function getName(string $name): string
    {
        return $name;
    }
}
