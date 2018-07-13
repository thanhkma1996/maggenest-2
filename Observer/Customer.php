<?php
namespace Test\Magennest2\Observer;
use Magento\Framework\Event\ObserverInterface;
class Customer implements ObserverInterface
{
    /** @var \Psr\Log\LoggerInterface $logger */
    protected $logger;
    protected  $customer;
    public function __construct(\Psr\Log\LoggerInterface $logger,
                                \Test\Magennest2\Model\VendorFactory $customer)
    {
        $this->logger = $logger;
        $this->customer = $customer;


    }
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $member = $this->customer->create();

        if($observer->getData('customer')){
            $customer = $observer->getData('customer');
            $email = $customer->getEmail();
            $Lastname = $customer->getLastName();
            $FirstName = $customer->getFirstName();

            $member->setEmail($email);
            $member->setLastName($Lastname);
            $member->setFirstName($FirstName);

            $member->save();

        }



        $this->logger->debug('Registered');
    }


}
