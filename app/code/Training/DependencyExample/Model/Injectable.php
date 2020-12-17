<?php

declare(strict_types=1);

namespace Training\DependencyExample\Model;

class Injectable implements InjectableInterface
{
    public function getId(): string
    {
        return 'Class Injectable';
    }
}
