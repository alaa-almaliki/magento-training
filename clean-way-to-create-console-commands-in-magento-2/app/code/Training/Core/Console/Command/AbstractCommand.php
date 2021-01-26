<?php

declare(strict_types=1);

namespace Training\Core\Console\Command;

use Magento\Framework\ObjectManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

abstract class AbstractCommand extends Command
{
    /**
     * @var ObjectManagerInterface
     */
    protected ObjectManagerInterface $objectManager;
    protected string $serviceClass;
    /**
     * @var InputInterface
     */
    private InputInterface $input;
    /**
     * @var OutputInterface
     */
    private OutputInterface $output;
    private $service;

    public function __construct(ObjectManagerInterface $objectManager, string $serviceClass)
    {
        parent::__construct(null);
        $this->objectManager = $objectManager;
        $this->serviceClass = $serviceClass;
    }

    abstract protected function handle(): void;

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->setInput($input);
        $this->setOutput($output);
        $this->handle();
    }

    protected function setInput(InputInterface $input)
    {
        $this->input = $input;
    }

    protected function setOutput(OutputInterface $output)
    {
        $this->output = $output;
    }

    protected function getOutput(): OutputInterface
    {
        return $this->output;
    }

    protected function getInput(): InputInterface
    {
        return $this->input;
    }

    protected function getService(array $data = [])
    {
        if (null !== $this->service) {
            return $this->service;
        }

        $this->service = $this->getObject($data);
        return $this->service;
    }

    private function getObject(array $data = [])
    {
        return $this->objectManager->create($this->serviceClass, $data);
    }
}
