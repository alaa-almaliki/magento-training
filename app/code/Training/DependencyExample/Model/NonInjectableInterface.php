<?php

declare(strict_types=1);

namespace Training\DependencyExample\Model;

interface NonInjectableInterface
{
    public function getId(): string;
}
