<?php

declare(strict_types=1);

namespace Training\LoggerExample\Logger;

use Magento\Framework\Logger\Handler\Base;

class Handler extends Base
{
    protected $loggerType = Logger::DEBUG;

    protected $fileName = '/var/log/logger-example.log';
}
