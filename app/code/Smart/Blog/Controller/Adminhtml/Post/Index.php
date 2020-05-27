<?php

namespace Smart\Blog\Controller\Adminhtml\Post;

use Magento\Backend\Model\View\Result\Page;
use Magento\Framework\App\Action\Action;
use Magento\Framework\Controller\ResultFactory;

class Index extends Action
{

    /**
     * @inheritDoc
     */
    public function execute()
    {
        /** @var Page $resultPage */
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);

        $resultPage->setActiveMenu('Smart_Blog::blog');
        $resultPage
            ->getConfig()
            ->getTitle()
            ->prepend(__('Posts'));

        return $resultPage;
    }
}
