<?php

declare(strict_types=1);

namespace Training\InjectablesAndNonInjectablesExample\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Training\InjectablesAndNonInjectablesExample\Service\Demand;
use Training\InjectablesAndNonInjectablesExample\Service\Supply;

class Example implements ArgumentInterface
{
    /**
     * @var Supply
     */
    protected Supply $supply;
    /**
     * @var Demand
     */
    protected Demand $demand;

    public function __construct(Supply $supply, Demand $demand)
    {
        $this->supply = $supply;
        $this->demand = $demand;
    }

    public function getSupply(): Supply
    {
        return $this->supply;
    }

    public function getDemand(): Demand
    {
        return $this->demand;
    }
}
