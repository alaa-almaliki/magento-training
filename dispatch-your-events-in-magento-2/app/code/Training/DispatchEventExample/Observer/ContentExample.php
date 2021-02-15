<?php

declare(strict_types=1);

namespace Training\DispatchEventExample\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Training\DispatchEventExample\Block\Example;

class ContentExample implements ObserverInterface
{

    public function execute(Observer $observer)
    {
        /** @var \Magento\Framework\View\Result\Page $page */
        $page =  $observer->getData('page');
        $page->getLayout()->addBlock(Example::class, 'example_content', 'content');
    }
}
