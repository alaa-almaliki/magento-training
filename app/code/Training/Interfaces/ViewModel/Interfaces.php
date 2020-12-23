<?php

declare(strict_types=1);

namespace Training\Interfaces\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Training\Interfaces\Api\SupplierRepositoryInterface;

class Interfaces implements ArgumentInterface
{
    /**
     * @var SupplierRepositoryInterface
     */
    protected SupplierRepositoryInterface $supplierRepository;

    public function __construct(SupplierRepositoryInterface $supplierRepository)
    {
        $this->supplierRepository = $supplierRepository;
    }

    public function getSupplierCode(): string
    {
        return $this->supplierRepository->createNew('ABC-12345')->getCode();
    }
}
