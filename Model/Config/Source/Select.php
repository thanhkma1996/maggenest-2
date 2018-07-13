<?php
namespace Test\Magennest2\Model\Config\Source;

use  \Test\Magennest2\Model\ResourceModel\Vendor\CollectionFactory as manuCollectionFactory;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class Select extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    protected $manuCollectionFactory;
    protected $_options;
    public function __construct(
        manuCollectionFactory $manuCollectionFactory
    ) {
        $this->manuCollectionFactory = $manuCollectionFactory;
    }


    public function getAllOptions($addEmpty = true)
    {

        $collection = $this ->manuCollectionFactory->create()->load();
        $_options = [];
        if($addEmpty){
            $_options[] = ['label' => __('-- Please Select a Product Vendor --'), 'value' => ''];
        }
        foreach ($collection as $manu) {
            $_options[] = ['label' => $manu->getFirstName(), 'value' => $manu->getId()];
        }

        return $_options;
    }
}