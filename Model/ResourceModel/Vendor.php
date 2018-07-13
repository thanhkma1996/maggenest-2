<?php
namespace Test\Magennest2\Model\ResourceModel;

class Vendor extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb {
    public function _construct() {
        $this->_init('magennest_test_vendor_thanhdev', 'id');
    }
}