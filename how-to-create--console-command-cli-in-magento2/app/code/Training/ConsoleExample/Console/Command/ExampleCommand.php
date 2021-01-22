<?php

declare(strict_types=1);

namespace Training\ConsoleExample\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ExampleCommand extends Command
{
    protected function configure()
    {
        parent::configure();
        $this->setName('training:example:run');
        $this->setDescription('Training Console Example');

        //$this->addArgument('required_product_id', InputArgument::REQUIRED, 'Product Id');
        //$this->addArgument('required_product_ids', InputArgument::REQUIRED|InputArgument::IS_ARRAY, 'Product Ids');

        //$this->addArgument('optional_product_id', InputArgument::OPTIONAL, 'Product Id');
        //$this->addArgument('optional_product_id', InputArgument::OPTIONAL|InputArgument::IS_ARRAY, 'Product Id');

        //$this->addOption('required_name', null, InputOption::VALUE_REQUIRED|InputOption::VALUE_IS_ARRAY, 'Required Name');

        //$this->addOption('optional_name', null, InputOption::VALUE_OPTIONAL|InputOption::VALUE_IS_ARRAY, 'Optional Name');

        $this->addOption('force', null, InputOption::VALUE_NONE, 'Force');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /**
         * One line text
         */
        //$output->write('Hello World');
        //$output->write('welcome back');

        /**
         * New line text
         */
        //$output->writeln('Hello World');
        //$output->writeln('welcome back');

        /**
         * Formatted(styled) text
         */
//        $output->writeln('Hello World');
//        $output->writeln('<info>Hello World</info>');
//        $output->writeln('<comment>Hello World</comment>');
//        $output->writeln('<error>Hello World</error>');
//        $output->writeln('<question>Hello World</question>');

//        $productId = $input->getArgument('required_product_ids');
//        $output->writeln($productId);

//        $productId = $input->getArgument('required_product_ids');
//        $output->writeln($productId);

//        $requiredName = $input->getOption('required_name');
//        $output->writeln($requiredName);

//        $optionalName = $input->getOption('optional_name');
//        $output->writeln($optionalName);

        if ($input->getOption('force')) {
            $output->writeln('Running by force');
        } else {
            $output->writeln('danger, you must know what are you doing');
        }
    }
}
