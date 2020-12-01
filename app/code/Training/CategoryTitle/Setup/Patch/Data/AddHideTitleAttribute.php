<?php

declare(strict_types=1);

namespace Training\CategoryTitle\Setup\Patch\Data;

use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchInterface;

class AddHideTitleAttribute implements DataPatchInterface
{
    /**
     * @var EavSetupFactory
     */
    protected $eavSetupFactory;
    /**
     * @var ModuleDataSetupInterface
     */
    protected $moduleDataSetup;

    /**
     * AddHideTitleAttribute constructor.
     *
     * @param EavSetupFactory $eavSetupFactory
     * @param ModuleDataSetupInterface $moduleDataSetup
     */
    public function __construct(EavSetupFactory $eavSetupFactory, ModuleDataSetupInterface $moduleDataSetup)
    {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->moduleDataSetup = $moduleDataSetup;
    }


    public function apply()
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);
        $eavSetup->addAttribute(\Magento\Catalog\Model\Category::ENTITY, 'hide_title', [
            'type'     => 'int',
            'label'    => 'Hide Title',
            'input'    => 'boolean',
            'source'   => \Magento\Eav\Model\Entity\Attribute\Source\Boolean::class,
            'visible'  => true,
            'default'  => '0',
            'required' => false,
            'global'   => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
            'group'    => 'Display Settings',
        ]);
    }

    public static function getDependencies()
    {
        return [];
    }

    public function getAliases()
    {
        return [];
    }
}
