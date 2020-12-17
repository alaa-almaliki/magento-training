<?php

declare(strict_types=1);

namespace Training\DependencyExample\Model\VirtualType;

class DefaultName
{
    /**
     * @var Name
     */
    protected Name $name;

    /**
     * DefaultName constructor.
     *
     * @param Name $name
     */
    public function __construct(Name $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name->getName('Default Name');
    }
}
