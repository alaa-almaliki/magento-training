<?php

declare(strict_types=1);

namespace Training\Example\Controller\Index;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\App\ResponseInterface;

class Forward implements ActionInterface
{
    /**
     * @var \Magento\Framework\Controller\Result\ForwardFactory
     */
    protected $forwardFactory;

    /**
     * Forward constructor.
     *
     * @param \Magento\Framework\Controller\Result\ForwardFactory $forwardFactory
     */
    public function __construct(\Magento\Framework\Controller\Result\ForwardFactory $forwardFactory)
    {
        $this->forwardFactory = $forwardFactory;
    }

    public function execute()
    {
        return $this->forwardFactory->create()->forward('page');
    }
}
