<?php

declare(strict_types=1);

namespace Training\AddRemoveBlockByObserver\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\View\Element\Template;

class AddRemoveBlock implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        /** @var $layout \Magento\Framework\View\Layout */
        $layout = $observer->getLayout();
        if ($observer->getFullActionName() === 'catalog_product_view') {
            // Start remove block
            $block = $layout->getBlock('view.addto.compare');
            if ($block) {
                $layout->unsetElement($block->getNameInLayout());
            }
            // remove block end

            // start add block
            $layout->addBlock(Template::class, 'training.test.block', 'product.info.addto')
                ->setTemplate('Training_AddRemoveBlockByObserver::test.phtml');
            // add block end
        }
    }
}
