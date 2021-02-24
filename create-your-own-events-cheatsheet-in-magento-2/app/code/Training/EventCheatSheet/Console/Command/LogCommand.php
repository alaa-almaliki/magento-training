<?php

declare(strict_types=1);

namespace Training\EventCheatSheet\Console\Command;

use Magento\Framework\Event\Config\Reader;
use Magento\Framework\Filesystem\Io\File;
use Magento\Framework\Stdlib\ArrayUtils;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class LogCommand extends Command
{
    /**
     * @var Reader
     */
    protected Reader $configReader;
    protected File $fileAdapter;
    /**
     * @var ArrayUtils
     */
    protected ArrayUtils $arrayUtils;

    /**
     * LogCommand constructor.
     *
     * @param Reader $configReader
     * @param File $fileAdapter
     * @param ArrayUtils $arrayUtils
     */
    public function __construct(Reader $configReader, File $fileAdapter, ArrayUtils $arrayUtils)
    {
        parent::__construct(null);
        $this->configReader = $configReader;
        $this->fileAdapter = $fileAdapter;
        $this->arrayUtils = $arrayUtils;
    }

    protected function configure()
    {
        parent::configure();
        $this->setName('training:events:log');
        $this->setDescription('Log Observer Events');

        $this->addArgument('scope', InputArgument::OPTIONAL, 'Scope');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $areas = ['global', 'frontend', 'adminhtml', 'webapi_rest', 'webapi_soap', 'graphql'];
        $scope = $input->getArgument('scope');
        if (in_array($scope, $areas)) {
            $areas = [$scope];
        }
        $events = [];
        foreach ($areas as $area) {
            $data = array_keys($this->configReader->read($area));
            $events[] = $data;
        }

        $this->fileAdapter->write('var/log/events.txt', implode(PHP_EOL, $this->arrayUtils->flatten($events)));
    }
}
