<?php

declare(strict_types=1);

namespace Training\MuteObserverExample\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Training\MuteObserverExample\Model\DeliveryTypes;

class DeliveryCommand extends Command
{
    /**
     * @var DeliveryTypes
     */
    protected DeliveryTypes $deliveryTypes;

    /**
     * DeliveryCommand constructor.
     *
     * @param DeliveryTypes $deliveryTypes
     */
    public function __construct(DeliveryTypes $deliveryTypes)
    {
        parent::__construct(null);
        $this->deliveryTypes = $deliveryTypes;
    }

    protected function configure()
    {
        parent::configure();
        $this->setName('delivery:types:list');
        $this->setDescription('List Delivery Types');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $types = $this->deliveryTypes->toDataObject();
        $output->writeln($types->getData('types'));
    }
}
