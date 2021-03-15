<?php

declare(strict_types=1);

namespace Training\PassDataToBlocks\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class AddTutorialLink implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        $block = $observer->getBlock();
        $fullActionName = $block->getRequest()->getFullActionName();
        $blockName = $block->getNameInLayout();

        if ($fullActionName === 'blocks_data_index_index' && $blockName === 'blocks_data') {
            $block->setTutorialLink('https://github.com/alaa-almaliki/magento-training');
        }
    }
}
