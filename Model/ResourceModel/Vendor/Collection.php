<?php
namespace Test\Magennest2\Model\ResourceModel\Vendor;

/**
 * Subscription Collection
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection {
    /**
     *	Initialize	resource	collection
     *
     *	@return	void
     */
    public function _construct() {
        $this->_init('Test\Magennest2\Model\Vendor', 'Test\Magennest2\Model\ResourceModel\Vendor');
    }
}