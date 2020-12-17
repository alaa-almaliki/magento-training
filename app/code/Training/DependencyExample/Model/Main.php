<?php

declare(strict_types=1);

namespace Training\DependencyExample\Model;

use Magento\Framework\DataObject;
use Training\DependencyExample\Model\VirtualType\DefaultName;

class Main
{
    protected array $data;
    /**
     * @var Injectable
     */
    protected Injectable $injectable;
    /**
     * @var NonInjectableFactory
     */
    protected NonInjectableInterfaceFactory $nonInjectableFactory;
    /**
     * @var AbstractUtil
     */
    protected AbstractUtil $util;
    /**
     * @var HeavyOperation
     */
    protected HeavyOperation $heavyOperation;
    /**
     * @var DefaultName
     */
    protected DefaultName $defaultName;
    /**
     * @var Optional|null
     */
    protected ?Optional $optional;
    /**
     * @var MethodInjection
     */
    protected MethodInjection $methodInjection;

    /**
     * Main constructor.
     *
     * @param InjectableInterface $injectable
     * @param NonInjectableInterfaceFactory $nonInjectableFactory
     * @param AbstractUtil $util
     * @param HeavyOperation $heavyOperation
     * @param DefaultName $defaultName
     * @param MethodInjection $methodInjection
     * @param Optional|null $optional
     * @param array $data
     */
    public function __construct(
        InjectableInterface $injectable,
        NonInjectableInterfaceFactory $nonInjectableFactory,
        AbstractUtil $util,
        HeavyOperation $heavyOperation,
        DefaultName $defaultName,
        MethodInjection $methodInjection,
        Optional $optional = null,
        array $data = []
    ) {
        $this->data = $data;
        $this->injectable = $injectable;
        $this->nonInjectableFactory = $nonInjectableFactory;
        $this->util = $util;
        $this->heavyOperation = $heavyOperation;
        $this->defaultName = $defaultName;
        $this->optional = $optional;
        $this->methodInjection = $methodInjection;
    }

    public function getId(): string
    {
        return $this->data['id'];
    }

    public function getInjectable(): Injectable
    {
        return $this->injectable;
    }

    public function getNonInjectable(): NonInjectable
    {
        return $this->nonInjectableFactory->create();
    }

    public function getUtil(): AbstractUtil
    {
        return $this->util;
    }

    public function getHeavyOperation(): HeavyOperation
    {
        return $this->heavyOperation;
    }

    public function getDefaultName(): DefaultName
    {
        return $this->defaultName;
    }

    public function getOptional(): Optional
    {
        return $this->optional;
    }

    public function getMethodInjectionName(): string
    {
        $dataObject = new DataObject(['name' => 'Method injection']);
        return $this->methodInjection->getName($dataObject);
    }
}
