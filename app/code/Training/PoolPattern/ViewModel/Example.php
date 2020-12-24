<?php

declare(strict_types=1);

namespace Training\PoolPattern\ViewModel;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Training\PoolPattern\Model\CodeValidationPool;

class Example implements ArgumentInterface
{
    /**
     * @var CodeValidationPool
     */
    protected CodeValidationPool $codeValidationPool;

    public function __construct(CodeValidationPool $codeValidationPool)
    {
        $this->codeValidationPool = $codeValidationPool;
    }

    public function getCode(RequestInterface $request): string
    {
        $code = (string) $request->getParam('code');
        $this->codeValidationPool->validate($code);
        return $code;
    }
}
