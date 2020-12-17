<?php

declare(strict_types=1);

namespace Training\DependencyExample\Model;

use Magento\Framework\DataObject;

class MethodInjection
{
    public function getName(DataObject $dataObject)
    {
        return $dataObject->getData('name');
    }
}
