<?php

declare(strict_types=1);

namespace Training\Core\Console\Command;

use Magento\Framework\ObjectManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class AbstractCommand
 *
 * @package Training\Core\Console\Command
 */
abstract class AbstractCommand extends Command
{
    /**
     * @var ObjectManagerInterface
     */
    protected ObjectManagerInterface $objectManager;
    /**
     * @var string
     */
    protected string $serviceClass;
    /**
     * @var InputInterface
     */
    private InputInterface $input;
    /**
     * @var OutputInterface
     */
    private OutputInterface $output;

    /**
     * @var mixed
     */
    private $service;

    /**
     * AbstractCommand constructor.
     *
     * @param ObjectManagerInterface $objectManager
     * @param string $serviceClass
     */
    public function __construct(ObjectManagerInterface $objectManager, string $serviceClass)
    {
        parent::__construct(null);
        $this->objectManager = $objectManager;
        $this->serviceClass = $serviceClass;
    }

    /**
     * implement instead of the execute method
     *
     * Handles the console execute method
     */
    abstract protected function handle(): void;

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->setInput($input);
        $this->setOutput($output);
        $this->handle();
    }

    /**
     * @param InputInterface $input
     */
    protected function setInput(InputInterface $input): void
    {
        $this->input = $input;
    }

    /**
     * @param OutputInterface $output
     */
    protected function setOutput(OutputInterface $output): void
    {
        $this->output = $output;
    }

    /**
     * @return OutputInterface
     */
    protected function getOutput(): OutputInterface
    {
        return $this->output;
    }

    /**
     * @return InputInterface
     */
    protected function getInput(): InputInterface
    {
        return $this->input;
    }

    /**
     * @param array $data
     * @return mixed
     */
    protected function getService(array $data = [])
    {
        if (null !== $this->service) {
            return $this->service;
        }

        $this->service = $this->getObject($data);
        return $this->service;
    }

    /**
     * @param array $data
     * @return mixed
     */
    private function getObject(array $data = [])
    {
        return $this->objectManager->create($this->serviceClass, $data);
    }
}
