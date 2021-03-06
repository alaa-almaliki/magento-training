<?php

declare(strict_types=1);

namespace Training\CronExample\Cron;

use Psr\Log\LoggerInterface;

class Example
{
    /**
     * @var LoggerInterface
     */
    protected LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function execute()
    {
        $this->logger->info('Starting running cron example');
        sleep(2);
        $this->logger->info('cron example finished');
    }
}
