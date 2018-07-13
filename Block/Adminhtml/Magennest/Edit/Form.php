<?php
namespace Test\Magennest2\Block\Adminhtml\Magennest\Edit;
use \Magento\Backend\Block\Widget\Form\Generic;
use function PHPSTORM_META\type;

class Form extends Generic
{
    protected $systemStore;
    protected $status;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Store\Model\System\Store $systemStore,
        array $data = []
    ) {
        $this->_systemStore = $systemStore;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    protected function _construct()
    {
        parent::_construct();
        $this->setId('grid_form');
        $this->setTitle(__('Magennest Information'));
    }

    protected function _prepareForm()
    {
        $model=$this->_coreRegistry->registry('magennest_edit');
        $form = $this->_formFactory->create(
            ['data' =>
                [
                    'id' => 'edit_form',
                    'action' => $this->getData('action'),
                    'method' => 'post'
                ]
            ]
        );
        $form->setHtmlIdPrefix('id');
        $fieldset = $form->addFieldset(
            'general_fieldset',
            [
                'legend' => __('Magennest Information'),
                'class' => 'fieldset-wide'
            ]
        );
       if($model!=null) {
            $fieldset->addField(
                'id',
                'text',
                [
                    'name' => 'id',
                    'label' => __('ID'),
                    'title' => __('ID'),
                    'require' => true
                ]
            );
     };

        $fieldset->addField(
            'first_name',
            'text',
            [
                'name'=> 'first_name',
                'label'=>__('first_name'),
                'title'=>__('first_name'),
                'require'=>true
            ]
        );

        $fieldset->addField(
            'last_name',
            'text',
            [
                'name'=>'last_name',
                'label'=>__('Last Name'),
                'title'=>__('Last Name'),
                'require'=>true
            ]
        );


        $fieldset->addField(
            'email',
            'text',
            [
                'name'=>'email',
                'label'=>__('email'),
                'title'=>__('email'),
                'require'=>true
            ]
        );


        $fieldset->addField(
            'company',
            'text',
            [
                'name'=>'company',
                'label'=>__('company'),
                'title'=>__('company'),
                'require'=>true
            ]
        );


        $fieldset->addField(
            'phone_number',
            'text',
            [
                'name'=>'phone_number',
                'label'=>__('phoner_number'),
                'title'=>__('Phone Number'),
                'require'=>true
            ]
        );

        $fieldset->addField(
            'fax',
            'text',
            [
                'name'=>'fax',
                'label'=>__('fax'),
                'title'=>__('fax'),
                'require'=>true
            ]
        );

        $fieldset->addField(
            'street',
            'text',
            [
                'name'=>'street',
                'label'=>__('street'),
                'title'=>__('street'),
                'require'=>true
            ]
        );

        $fieldset->addField(
            'address',
            'text',
            [
                'name'=>'address',
                'label'=>__('Address'),
                'title'=>__('Address'),
                'require'=>true
            ]
        );

        $fieldset->addField(
            'city',
            'text',
            [
                'name'=>'city',
                'label'=>__('city'),
                'title'=>__('city'),
                'require'=>true
            ]
        );


        $fieldset->addField(
            'postcode',
            'text',
            [
                'name'=>'postcode',
                'label'=>__('postcode'),
                'title'=>__('postcode'),
                'require'=>true
            ]
        );


        $fieldset->addField(
            'customer',
            'select',
            [
                'name'=>'customer_id',
                'label'=>__('customer_id'),
                'title'=>__('customer_id'),
                'require'=>true,
                'options' => ['0' => __('Select customer id'),
                    '1' => __('1'),
                    '2' => __('2'),
                    '3' => __('3'),
                    '4' => __('4'),
                    '5' => __('5'),
                    '6' => __('6'),
                    '7' => __('7'),
                    '8' => __('8'),
                    '9' => __('9'),
                    '10' => __('10')]
            ]

        );

          $fieldset->addField(
                    'coutry',
                    'select',
                    [
                        'name'=>'coutry',
                        'label'=>__('coutry'),
                        'title'=>__('coutry'),
                        'require'=>true,
                        'options' => ['0' => __('Select coutry of you'),
                            'VietNam' => __('VietNam'),
                            'lao' => __('lao'),
                            'VietNam' => __('VietNam'),
                            ]
                    ]

                );


       if($model != null){
         $form->setValues($model->getData());
        $this->setForm($form);

           }
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}