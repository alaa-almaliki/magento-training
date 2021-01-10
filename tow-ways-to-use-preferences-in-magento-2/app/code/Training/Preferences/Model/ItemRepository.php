<?php

declare(strict_types=1);

namespace Training\Preferences\Model;

use Training\Preferences\Api\Data\ItemInterface;
use Training\Preferences\Api\Data\ItemInterfaceFactory;
use Training\Preferences\Api\ItemRepositoryInterface;

class ItemRepository implements ItemRepositoryInterface
{
    /**
     * @var ItemInterfaceFactory
     */
    protected ItemInterfaceFactory $itemFactory;

    public function __construct(ItemInterfaceFactory $itemFactory)
    {
        $this->itemFactory = $itemFactory;
    }

    public function newItem(string $code): ItemInterface
    {
        return $this->itemFactory->create()->setCode($code);
    }
}
