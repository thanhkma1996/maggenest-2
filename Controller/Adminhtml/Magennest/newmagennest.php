<?php
namespace Test\Magennest2\Controller\Adminhtml\Magennest;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
class newmagennest extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        return $resultPage;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Test_Magennest2::newmagennest');
    }

}