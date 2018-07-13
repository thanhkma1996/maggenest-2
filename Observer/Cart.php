<?php
namespace Test\Magennest2\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\RequestInterface;
use Psr\Log\LoggerInterface;
class Cart implements ObserverInterface
{
    protected $_productRepository;
    protected $_cart;
    protected $formKey;
    public function __construct(
        \Magento\Checkout\Model\Cart $cart,
        \Psr\Log\LoggerInterface $logger,
        \Magento\Framework\Data\Form\FormKey $formKey){
        $this->cart = $cart;
        $this->formKey = $formKey;
        $this->logger = $logger;
    }
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $totals = $this->cart->getQuote()->getTotals();
        $subtotal = $totals['subtotal']->getValue();
        $this->logger->debug($subtotal);
    }

}