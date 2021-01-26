<?php

declare(strict_types=1);

namespace Training\ConsoleExample\Service;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Training\ConsoleExample\Model\ProductKey;

class Example
{
    /**
     * @var ProductRepositoryInterface
     */
    protected ProductRepositoryInterface $productRepository;
    /**
     * @var ProductKey
     */
    protected ProductKey $productKey;

    public function __construct(ProductRepositoryInterface $productRepository, ProductKey $productKey)
    {
        $this->productRepository = $productRepository;
        $this->productKey = $productKey;
    }

    public function getProductKey(int $productId, string $productPrefix): string
    {
        $product = $this->productRepository->getById((int) $productId);
        return $this->productKey->getKey($product, $productPrefix);
    }
}
