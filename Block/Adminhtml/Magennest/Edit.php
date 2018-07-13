<?php
namespace Test\Magennest2\Block\Adminhtml\Magennest;
use Magento\Backend\Block\Widget\Form\Container as FormContainer;
use Magento\Framework\Registry;
use Magento\Backend\Block\Widget\Context;
class Edit extends FormContainer{
    protected $coreRegistry;

    public function __construct(
        Context $context,
        Registry $registry,
        array $data = [])
    {
        parent::__construct($context, $data);
    }

    public function getHeaderText()
    {
        $magenestMovie = $this->coreRegistry->registry('magennest_edit');
        if ($magenestMovie->getId())
        {
            return __("Edit Option '%1'", $this->escapeHtml($magenestMovie->getTitle()));
        }
        return __('New Option');
    }
    protected function _construct()
    {
        parent::_construct();
        $this->_objectId='id';
        $this->_blockGroup='Test_Magennest2';
        $this->_controller = 'adminhtml_magennest';
        $this->buttonList->update('save', 'label', __('Save Magennest2'));
        $this->removeButton('back');

        $this->addButton(
            'back_button',
            [
                'label' => __('Back'),
                'onclick' => 'setLocation(\'' . $this->getUrl('magennest2/magennest/index') . '\')',
                'class' => 'back'
            ],
            -1
        );
    }
}