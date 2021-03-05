<?php

declare(strict_types=1);

namespace Training\FirePHP\Model;

use Monolog\Handler\FirePHPHandler;
use \Monolog\Logger as MonologLogger;

class Logger
{
    private MonologLogger $logger;

    public function __construct(\Monolog\LoggerFactory $loggerFactory)
    {
        $this->logger = $loggerFactory->create([
            'name' => 'fire_php',
            'handlers' => [new FirePHPHandler()]
        ]);
    }

    public function getLogger(): MonologLogger
    {
        return $this->logger;
    }

    public function debug(string $message, array $context = []): void
    {
        $this->getLogger()->debug($message, $context);
    }
}
