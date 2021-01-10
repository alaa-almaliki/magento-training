<?php

declare(strict_types=1);

namespace Training\VirtualTypeExample2\Controller\Index;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\View\Result\PageFactory;

class Index implements ActionInterface
{
    /**
     * @var PageFactory
     */
    protected PageFactory $pageFactory;

    public function __construct(PageFactory $pageFactory)
    {
        $this->pageFactory = $pageFactory;
    }

    public function execute()
    {
        $page = $this->pageFactory->create();
        $page->getConfig()->getTitle()->set('Virtual Types in Magento 2');
        return $page;
    }
}
