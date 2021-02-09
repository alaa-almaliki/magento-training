<?php

declare(strict_types=1);

namespace Training\ObserverExample\Logger;

use Magento\Framework\Logger\Handler\Base;

class Handler extends Base
{
    protected $fileName = 'var/log/observer-example.log';
}
