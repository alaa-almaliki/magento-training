<?php

declare(strict_types=1);

namespace Training\Example\Controller\Index;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\App\ResponseInterface;

class Json implements ActionInterface
{
    /**
     * @var \Magento\Framework\Controller\Result\JsonFactory
     */
    protected $jsonFactory;

    /**
     * Json constructor.
     *
     * @param \Magento\Framework\Controller\Result\JsonFactory $jsonFactory
     */
    public function __construct(\Magento\Framework\Controller\Result\JsonFactory $jsonFactory)
    {
        $this->jsonFactory = $jsonFactory;
    }

    public function execute()
    {
        return $this->jsonFactory->create()
            ->setHeader('Content-Type', 'application/json')
            ->setData([
                'name' => 'Alaa Al-Maliki',
                'job' => 'Magento Developer'
            ]);
    }
}
