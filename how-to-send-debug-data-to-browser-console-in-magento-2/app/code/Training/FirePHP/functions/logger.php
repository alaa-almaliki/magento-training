<?php

declare(strict_types=1);

if (!function_exists('consoleLog'))
{
    function consoleLog(string $message, array $context = []): void
    {
        \Magento\Framework\App\ObjectManager::getInstance()
            ->get(\Training\FirePHP\Model\Logger::class)
            ->debug($message, $context);
    }
}
