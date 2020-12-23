<?php

declare(strict_types=1);

namespace Training\ReplaceConstructorArguments\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Training\ReplaceConstructorArguments\Model\DefaultName;

class Example implements ArgumentInterface
{
    /**
     * @var DefaultName
     */
    protected DefaultName $defaultName;

    /**
     * Example constructor.
     *
     * @param DefaultName $defaultName
     */
    public function __construct(DefaultName $defaultName)
    {
        $this->defaultName = $defaultName;
    }

    public function getName(): string
    {
        return $this->defaultName->getName();
    }
}
