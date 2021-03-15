<?php

declare(strict_types=1);

namespace Training\PassDataToBlocks\Block;

use Magento\Framework\View\Element\Template;

/**
 * Class Example
 *
 * @package Training\PassDataToBlocks\Block
 */
class Example extends Template
{
    public function getDummyName(): string
    {
        return 'Alaa Al-Maliki';
    }
}
