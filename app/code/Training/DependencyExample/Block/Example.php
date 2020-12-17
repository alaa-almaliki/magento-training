<?php

declare(strict_types=1);

namespace Training\DependencyExample\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Training\DependencyExample\Model\Main;

class Example extends Template
{
    /**
     * @var Main
     */
    protected Main $main;

    public function __construct(
        Context $context,
        Main $main,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->main = $main;
    }

    public function getMain(): Main
    {
        return $this->main;
    }
}
