<?php
namespace Test\Magennest2\Block;

use  Magento\Framework\View\Element\Template;

class Magennest extends Template
{
    private $_manuCollection;


    public function __construct(
        Template\Context $context,
        \Test\Magennest2\Model\ResourceModel\Vendor\CollectionFactory $manuCollection,
        array $data=[])
    {
        parent::__construct($context, $data);
        $this->_manuCollection = $manuCollection;

    }

    public function getpart()
    {
        $collection = $this->_manuCollection->create();
        return $collection;
    }




}