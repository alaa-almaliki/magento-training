<?php

declare(strict_types=1);

namespace Training\Example\Controller\Index;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\App\ResponseInterface;

class Redirect implements ActionInterface
{
    /**
     * @var \Magento\Framework\Controller\Result\RedirectFactory
     */
    protected $redirectFactory;

    public function __construct(\Magento\Framework\Controller\Result\RedirectFactory $redirectFactory)
    {
        $this->redirectFactory = $redirectFactory;
    }

    public function execute()
    {
        return $this->redirectFactory->create()->setUrl('/example/index/page');
    }
}
