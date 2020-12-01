<?php

declare(strict_types=1);

namespace Training\CategoryTitle\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class ToggleCategoryTitle implements ObserverInterface
{
    /**
     * @var \Magento\Catalog\Model\Layer\Resolver
     */
    protected $resolver;

    /**
     * ToggleCategoryTitle constructor.
     *
     * @param \Magento\Catalog\Model\Layer\Resolver $resolver
     */
    public function __construct(\Magento\Catalog\Model\Layer\Resolver $resolver)
    {
        $this->resolver = $resolver;
    }

    public function execute(Observer $observer)
    {
        $block = $observer->getBlock();
        $fullActionName = $block->getRequest()->getFullActionName();
        $blockName = $block->getNameInLayout();
        $currentCategory = $this->resolver->get()->getCurrentCategory();

        if ($fullActionName === 'catalog_category_view' &&
            $blockName === 'page.main.title' &&
            ((bool) $currentCategory->getHideTitle()) === true
        ) {
            $cssClass = $block->getCssClass() ?
                ' category-title-hidden' . $block->getCssClass() :
                'category-title-hidden';
            $block->setCssClass($block->getCssClass() . $cssClass);
        }
    }
}
