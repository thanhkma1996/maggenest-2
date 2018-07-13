<?php
namespace Test\Magennest2\Controller\Ajax;

use Magento\Framework\App\Action\Context;

class Handle extends \Magento\Framework\App\Action\Action
{
    protected $resultJsonFactory;
    protected  $vendorFactory;
    public function __construct(
        Context $context,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory

    )
    {
        parent::__construct($context);
        $this->resultJsonFactory = $resultJsonFactory;
    }

    public function execute()
    {
        if ($this->getRequest()->isAjax()) {
            $id = $this->getRequest()->getParam('id');

            $objectManager = \Magento\Framework\App\ObjectManager::getInstance();


            $customer = $objectManager->create('Test\Magennest2\Model\Vendor')->load($id);

            echo 'ID:'.$customer->getID().'<br/>';
            echo 'Name:'.$customer->getFirstName().'<br/>';
            echo 'Email:'.$customer->getEmail().'<br/>';

        }

//
//        $customer->getFirstName();
//        $customer->getEmail();
//        $customer->getID();
//        foreach ($customer as $items) {
//            foreach ($id as $mail) {
//                if ($mail === $items->getID()) {
//                    $name = $items->getFirstname() . ' ' . $items->getLastname();
//                }
//            }
//        }
//        return $this->resultJsonFactory->create()->setData([
//            'message' => $name
//        ]);


//        if ($this->getRequest()->isAjax()) {
//
//            $email = $this->getRequest()->getParam('email');
//
//            $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
//
//            $customer = $objectManager->create('\Magento\Customer\Model\ResourceModel\Customer\Collection')->getItemsByColumnValue('email', $email);
//
//            foreach ($customer as $items) {
//                echo 'Name: ' . $items->getFirstname() . ' ' . $items->getLastname() . '<br>';
//            }
//
//        }
    }
}