<?php

declare(strict_types=1);

namespace Training\LayoutRemoveExample\Plugin;

use Magento\Framework\App\RequestInterface;

class RenderCustomerNew
{
    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * RenderCustomerNew constructor.
     *
     * @param RequestInterface $request
     */
    public function __construct(RequestInterface $request)
    {
        $this->request = $request;
    }

    public function afterGetAttribute(\Magento\Framework\Data\Structure $subject, $result, $elementId, $attribute)
    {
        if ($this->request->getFullActionName() === 'customer_account_login') {
            if ($elementId === 'customer.new' && $attribute === 'display') {
                return true;
            }
        }

        return $result;
    }
}
