<?php

declare(strict_types=1);

namespace Training\ObserverExample\Observer\Frontend;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Training\ObserverExample\Logger\Logger;

class Example implements ObserverInterface
{
    /**
     * @var Logger
     */
    protected Logger $logger;

    /**
     * Example constructor.
     *
     * @param Logger $logger
     */
    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function execute(Observer $observer)
    {
        $this->logger->info('Event Triggered in frontend scope');
    }
}
