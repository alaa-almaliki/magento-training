<?php

declare(strict_types=1);

namespace Training\Example\Controller\Index;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\Controller\Result\RawFactory;

/**
 * Class Index
 *
 * @package Training\Example\Controller\Index
 */
class Index implements ActionInterface
{
    /**
     * @var RawFactory
     */
    protected $resultFactory;

    /**
     * Index constructor.
     *
     * @param RawFactory $resultFactory
     */
    public function __construct(RawFactory $resultFactory)
    {
        $this->resultFactory = $resultFactory;
    }

    public function execute()
    {
        return $this->resultFactory->create()
            ->setHeader('Content-Type', 'text/xml')
            ->setContents('<root><name>Alaa Al-Maliki</name><job>Magento Developer</job></root>');
    }
}
