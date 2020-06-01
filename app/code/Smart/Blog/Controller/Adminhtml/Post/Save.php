<?php

namespace Smart\Blog\Controller\Adminhtml\Post;

use Exception;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Registry;
use Smart\Blog\Api\Data\PostInterface;
use Smart\Blog\Api\Data\PostInterfaceFactory;
use Smart\Blog\Api\Repository\PostRepositoryInterface;
use Smart\Blog\Controller\Adminhtml\Post;

class Save extends Post
{
    /**
     * @var JsonFactory
     */
    private $jsonFactory;

    public function __construct(
        PostInterfaceFactory $postFactory,
        PostRepositoryInterface $postRepository,
        Registry $registry,
        Context $context,
        JsonFactory $jsonFactory
    ) {
        $this->jsonFactory = $jsonFactory;

        parent::__construct($postFactory, $postRepository, $registry, $context);
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $id             = $this->getRequest()->getParam(PostInterface::ID);
        $resultRedirect = $this->resultRedirectFactory->create();
        $data           = $this->getRequest()->getParams();
        if ($data) {
            if (empty($data['entity_id'])) {
                $data['entity_id'] = null;
            }

            /** @var \Smart\Blog\Model\Post $model */
            $model = $this->initModel();
            if (!$model->getId() && $id) {
                $this->messageManager->addErrorMessage(__('This post no longer exists.'));

                return $resultRedirect->setPath('*/*/');
            }
            $model->addData($data);

            try {
                $this->postRepository->save($model);
                $this->messageManager->addSuccessMessage(__('You saved the post.'));
                if ($this->getRequest()->getParam('back') == 'edit') {
                    return $resultRedirect->setPath('*/*/edit', [PostInterface::ID => $model->getId()]);
                }

                return $this->context->getResultRedirectFactory()->create()->setPath('*/*/');
            } catch (Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());

                return $resultRedirect->setPath(
                    '*/*/edit',
                    [PostInterface::ID => $this->getRequest()->getParam(PostInterface::ID)]
                );
            }
        } else {
            $resultRedirect->setPath('*/*/');
            $this->messageManager->addErrorMessage('No data to save.');

            return $resultRedirect;
        }
    }
}
