<?php
namespace Test\Magennest2\Setup;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Setup\EavSetupFactory;

class UpgradeData implements UpgradeDataInterface
{
    protected $resourceConfig;
    private $eavSetupFactory;

    public function __construct
    (\Magento\Config\Model\ResourceModel\Config $resourceConfig,EavSetupFactory $eavSetupFactory)
    {
        $this->resourceConfig = $resourceConfig;
        $this->eavSetupFactory = $eavSetupFactory;
    }


    public function upgrade(ModuleDataSetupInterface $setup,
                            ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(),
                '1.0.1') < 0) {
            $this->resourceConfig->saveConfig(
                'web/cookie/cookie_lifetime',
                '7200',
                \Magento\Config\Block\System\Config\
                Form::SCOPE_DEFAULT,
                0
            );
            if (version_compare($context->getVersion(),
                    '1.0.1') < 0) {

                $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
                $eavSetup->addAttribute(
                    \Magento\Catalog\Model\Product::ENTITY,
                    'thanhdev_is_approved',
                    [
                        'type' => 'int',
                        'backend' => '',
                        'frontend' => '',
                        'label' => 'thanhdev_is_approved',
                        'input' => 'text',
                        'class' => '',
                        'source' => '',
                        'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                        'visible' => true,
                        'required' => true,
                        'user_defined' => false,
                        'default' => '',
                        'searchable' => false,
                        'filterable' => false,
                        'comparable' => false,
                        'visible_on_front' => false,
                        'used_in_product_listing' => true,
                        'unique' => false,
                        'apply_to' => ''
                    ]
                );

            }

            // thanh produc vendor

            if (version_compare($context->getVersion(),
                    '1.0.1') < 0) {

                $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
                $eavSetup->addAttribute(
                    \Magento\Catalog\Model\Product::ENTITY,
                    'thanh_product_vendor',
                    [
                        'type' => 'int',
                        'backend' => '',
                        'frontend' => '',
                        'label' => 'Produc Vendor',
                        'input' => 'select',
                        'class' => '',
                        'source' => 'Test\Magennest2\Model\Config\Source\Select',
                        'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                        'visible' => true,
                        'required' => true,
                        'user_defined' => false,
                        'default' => '',
                        'searchable' => false,
                        'filterable' => false,
                        'comparable' => false,
                        'visible_on_front' => false,
                        'used_in_product_listing' => true,
                        'unique' => false,
                        'apply_to' => ''
                    ]
                );

            }


        }
    }
}