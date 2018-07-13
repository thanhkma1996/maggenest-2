<?php

namespace Test\Magennest2\Controller\Adminhtml\Magennest;

use Magento\Backend\App\Action;

class Save extends \Magento\Backend\App\Action
{
    /**
     * @var \Magento\Framework\App\Cache\TypeListInterface
     */
    protected $cacheTypeList;

    /**
     * @var \Magento\Backend\Helper\Js
     */
    protected $jsHelper;

    /**
     * @param Action\Context $context
     * @param \Magento\Backend\Helper\Js $jsHelper
     */

    protected $_movieFactory;

    public function __construct(
        Action\Context $context,
        \Magento\Framework\App\Cache\TypeListInterface $cacheTypeList,
        \Magento\Backend\Helper\Js $jsHelper,
        \Test\Magennest2\Model\Vendor $magenestMovieFactory
    )
    {
        parent::__construct($context);
        $this->cacheTypeList = $cacheTypeList;
        $this->jsHelper = $jsHelper;
        $this->_movieFactory = $magenestMovieFactory;
    }

    /**
     * {@inheritdoc}
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Test_Magennest2::save');
    }

    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
//        $data = $this->getRequest()->getPostValue();
        $data = $this->getRequest()->getParams();

        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data) {
            var_dump($data);
            $model = $this->_objectManager->create('Test\Magennest2\Model\Vendor');

            $id = $this->getRequest()->getParam('id');
            if ($id) {
                $model->load($id);
            }

                    $model->setData($data);

            $this->_eventManager->dispatch(
                'magennest2_grid_prepare_save',
                ['grid' => $model, 'request' => $this->getRequest()]
            );
//            $movie = $this->_movieFactory->create();
//            $movie->setData($data)->save();

            try {
                $model->save();
                $this->cacheTypeList->invalidate('full_page');
                $this->messageManager->addSuccess(__('Magennest saved.'));
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['id' => $model->getId(), '_current' => true]);
                }
                return $resultRedirect->setPath('*/*/index');
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the movie.'));
            }

            $this->_getSession()->setFormData($data);
            return $resultRedirect->setPath('*/*/edit', ['id' => $this->getRequest()->getParam('id')]);
        }
        return $resultRedirect->setPath('*/*/index');
    }
}


