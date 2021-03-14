<?php

declare(strict_types=1);

namespace Training\DisableCronExample\Cron;

use Psr\Log\LoggerInterface;

class Example
{
    /**
     * @var LoggerInterface
     */
    protected LoggerInterface $logger;

    /**
     * Example constructor.
     *
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function execute()
    {
        $this->logger->info('Running Cron Example');
        sleep(2);
        $this->logger->info('Cron Example ends');
    }
}
