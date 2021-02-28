<?php

declare(strict_types=1);

namespace Training\EventsLogger\Plugin;

use Magento\Framework\Filesystem\DirectoryList;
use Magento\Framework\Filesystem\Io\File;
use Magento\Framework\Serialize\Serializer\Json;

class EventsLogger
{
    /**
     * @var array
     */
    private static array $events = [];
    /**
     * @var Json
     */
    protected Json $jsonSerializer;
    /**
     * @var File
     */
    protected File $fileAdapter;
    /**
     * @var DirectoryList
     */
    protected DirectoryList $directoryList;

    public function __construct(Json $jsonSerializer, File $fileAdapter, DirectoryList $directoryList)
    {
        $this->jsonSerializer = $jsonSerializer;
        $this->fileAdapter = $fileAdapter;
        $this->directoryList = $directoryList;
    }

    public function beforeDispatch(\Magento\Framework\Event\Manager $subject, $eventName, array $data = [])
    {
        static::$events[$eventName] = $eventName . ':' . $this->jsonSerializer->serialize($this->getData($data));
        $this->fileAdapter->write(
            $this->directoryList->getRoot() . '/var/log/events.txt',
            implode(PHP_EOL, static::$events)
        );
    }

    private function getData(array $data)
    {
        $dispatchedData = [];
        foreach ($data as $key => $value) {
            if (is_object($value)) {
                $dispatchedData[] = $key . ':' . get_class($value);
            }

            if (is_scalar($value)) {
                $dispatchedData[] = $key . ':' . $value;
            }

            if (is_array($value)) {
                $dispatchedData[] = $this->getData($value);
            }
        }

        return $dispatchedData;
    }
}
