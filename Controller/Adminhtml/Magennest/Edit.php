<?php

namespace Test\Magennest2\Controller\Adminhtml\Magennest;
use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Registry;

class Edit extends Action
{
    protected $resultPageFactory;
    protected $coreRegistry;

    /**
     * Edit constructor.
     * @param Action\Context $context
     * @param PageFactory $resultPageFactory
     * @param Registry $registry
     */
    public function __construct(
        Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Registry $registry
    )
    {
        $this->resultPageFactory=$resultPageFactory;
        $this->coreRegistry=$registry;
        parent::__construct($context);
    }

    public function _initAction()
    {
        $resultPage=$this->resultPageFactory->create();
        $resultPage->setActiveMenu('Test_Magennest2::edit');
        $resultPage->getConfig()->getTitle()->set(__('Magenest Edit'));
        return $resultPage;
    }


    public function execute()
    {
        $id = $this->getRequest()->getParam('id');

        $model = $this->_objectManager->create('Test\Magennest2\Model\Vendor');
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This movie no longer exists.'));
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }

        $data = $this->_objectManager->get('Magento\Backend\Model\Session')->getFormData(true);


        if (!empty($data)) {
            $model->setData($data);
        }

        $this->coreRegistry->register('magennest_edit', $model);
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_initAction();
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? __('Edit Movie ', $model->getData('option_name')) : __('Edit'));
//        '%1'
        return $resultPage;
    }

}