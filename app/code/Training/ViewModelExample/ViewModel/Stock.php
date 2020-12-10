<?php

declare(strict_types=1);

namespace Training\ViewModelExample\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;

class Stock implements ArgumentInterface
{
    public function getStatus(): string
    {
        $value = random_int(1, 10);

        if ($value < 6) {
            return 'Ending soon';
        }

        return sprintf('%d Available', $value);
    }
}
