<?php
namespace Test\Magennest2\Controller\Adminhtml\Magennest;

use \Magento\Backend\App\Action\Context;
use \Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action {
    protected $resultPageFactory;
    public function __construct(Context $context, PageFactory $resultPageFactory){
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }
    public function execute(){
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Test_Magennest2::index');
        $resultPage->addBreadcrumb(__('Magennest'), __('Magennest'));
        $resultPage->addBreadcrumb(__('Magennest'), __('Magennest'));
        $resultPage->getConfig()->getTitle()->prepend(__('Magennest Admin Management'));
        return $resultPage;
    }
    public function _isAllowed(){
        return $this->_authorization->isAllowed('Test_Magennest2::index');
    }
}