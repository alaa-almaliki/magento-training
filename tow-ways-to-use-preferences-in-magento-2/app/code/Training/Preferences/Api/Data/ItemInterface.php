<?php

declare(strict_types=1);

namespace Training\Preferences\Api\Data;

interface ItemInterface
{
    public function setCode(string $code): ItemInterface;

    public function getCode(): string;
}
