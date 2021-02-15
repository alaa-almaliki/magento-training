<?php

declare(strict_types=1);

namespace Training\DispatchEventExample\Block;

use Magento\Framework\View\Element\Template;

class Example extends Template
{
    public function toHtml()
    {
        return 'This is example from dispatch event tutorial';
    }
}
