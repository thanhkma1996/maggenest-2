<?php
namespace Test\Magennest2\Block\Adminhtml;
class Magennest extends \Magento\Backend\Block\Widget\Grid\Container
{
    protected function _construct()
    {
        $this->_blockGroup = 'Test_Magennest2';
        $this->_controller = 'adminhtml_magennest';
        $this->removeButton('add');
        parent::_construct();
    }

    protected function _addNewButton()
    {
        $this->addButton(
            'add_button',
            [
                'label' => __('Add Magennest'),
                'onclick' => 'setLocation(\'' . $this->getUrl('magennest2/magennest/newmagennest') . '\')',
                'class' => 'add primary'
            ]
        );
    }


}