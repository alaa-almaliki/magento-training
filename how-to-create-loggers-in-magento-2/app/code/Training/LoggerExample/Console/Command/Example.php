<?php

declare(strict_types=1);

namespace Training\LoggerExample\Console\Command;

use Monolog\Handler\NativeMailerHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class Example extends Command
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
        parent::__construct(null);
        $this->logger = $logger;
    }

    protected function configure()
    {
        $this->setName('logger:example:run');
        $this->setDescription('Run Logger Example');
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->logger->info('Logger Example Info');
        $this->logger->debug('Logger Example Debug');
        $this->logger->error('Logger Example Error');
        $this->logger->critical('Logger Example Critical');
    }
}
