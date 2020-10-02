<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 14/07/2017
 * Time: 14:19
 */

namespace Tutorial\Long\Controller\Adminhtml\Post;


use Magento\Backend\App\Action;
use Magento\Framework\App\Filesystem\DirectoryList;

class Delete extends Action
{

    /**
     *
     * @var \Magento\Framework\App\Filesystem\DirectoryList
     */
    protected $_directoryList;
    protected $_coreRegistry;
    const ADMIN_RESOURCE = 'Tutorial_Long::post_delete';

    public function __construct(
        Action\Context $context,
        \Magento\Framework\App\Filesystem\DirectoryList $directoryList
    )
    {
        $this->_directoryList = $directoryList;
        parent::__construct($context);
    }

    /**
     * Dispatch request
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {

        $id = $this->getRequest()->getParam('post_id');
        $model = $this->_objectManager->create('Tutorial\Long\Model\Post');
            /** @var \Tutorial\Long\Model\Post $model */
        $model->load($id);
        $postPathUpload = $this->_directoryList->getRoot() . DIRECTORY_SEPARATOR . DirectoryList::PUB . DIRECTORY_SEPARATOR . DirectoryList::MEDIA . DIRECTORY_SEPARATOR;
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if($model->getData('post_id') && (int)$id>0){
            try{

            if ($model->getData('post_id')){
                $title = $model->getData('title');
                $image = $model->getData('image');
                $model->delete();
                $this->messageManager->addSuccess(__($title.' has been deleted'));
                return $resultRedirect->setPath('*/*/');
            }
            }catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
                return $resultRedirect->setPath('*/*/');
            }
        }else{
            $this->messageManager->addError(__('Post not found'));
            return $resultRedirect->setPath('*/*/');
        }
    }
}