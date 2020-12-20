<?php

declare(strict_types=1);

namespace Training\InjectablesAndNonInjectablesExample\Service;

use Training\InjectablesAndNonInjectablesExample\Model\Item;
use Training\InjectablesAndNonInjectablesExample\Model\ItemFactory;
use Training\InjectablesAndNonInjectablesExample\Model\Supplier;

class Demand
{
    /**
     * @var Supplier
     */
    protected Supplier $supplier;
    /**
     * @var ItemFactory
     */
    protected ItemFactory $itemFactory;

    public function __construct(Supplier $supplier, ItemFactory $itemFactory)
    {
        $this->supplier = $supplier;
        $this->itemFactory = $itemFactory;
    }

    public function getSupplier(): Supplier
    {
        return $this->supplier;
    }

    public function getItem(): Item
    {
        return $this->itemFactory->create();
    }
}
