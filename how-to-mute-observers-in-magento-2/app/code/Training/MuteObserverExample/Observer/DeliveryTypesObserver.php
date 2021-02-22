<?php

declare(strict_types=1);

namespace Training\MuteObserverExample\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class DeliveryTypesObserver implements ObserverInterface
{
    public static bool $muted = false;

    public function execute(Observer $observer)
    {
        if (static::$muted === false) {
            $types = $observer->getData('types');
            $deliveryTypes = $types->getData('types');
            $deliveryTypes[] = 'Express 2-3 days';
            $deliveryTypes[] = 'Standard 3-5 days';
            $types->setData('types', $deliveryTypes);
        }
    }
}
