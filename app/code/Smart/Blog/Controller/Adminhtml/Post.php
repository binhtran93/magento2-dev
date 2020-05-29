<?php

namespace Smart\Blog\Controller\Adminhtml;

use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Page\Interceptor;
use Magento\Framework\App\Action\Action;
use Magento\Framework\Registry;
use Smart\Blog\Api\Data\PostInterface;
use Smart\Blog\Api\Data\PostInterfaceFactory;
use Smart\Blog\Api\Repository\PostRepositoryInterface;

abstract class Post extends Action
{
    /**
     * @var PostRepositoryInterface
     */
    protected $postRepository;

    /**
     * @var PostInterfaceFactory
     */
    protected $postFactory;

    /**
     * @var Context
     */
    protected $context;

    /**
     * @var Registry
     */
    protected $registry;

    public function __construct(
        PostInterfaceFactory $postFactory,
        PostRepositoryInterface $postRepository,
        Registry $registry,
        Context $context
    ) {
        $this->postRepository = $postRepository;
        $this->registry = $registry;
        $this->context = $context;
        $this->postFactory = $postFactory;

        $this->resultFactory = $context->getResultFactory();

        parent::__construct($context);
    }

    /**
     * @return PostInterface
     */
    public function initModel()
    {
        $model = $this->postFactory->create();
        $id    = $this->getRequest()->getParam(PostInterface::ID);

        if ($id && !is_array($id)) {
            $model = $this->postRepository->get($id);
        }

        $this->registry->register('current_model', $model);

        return $model;
    }

    /**
     * {@inheritdoc}
     * @param Interceptor $resultPage
     *
     * @return Interceptor
     */
    protected function initPage($resultPage)
    {
        $resultPage->setActiveMenu('Mirasvit_Blog::blog');
        $resultPage->getConfig()->getTitle()->prepend(__('Mirasvit Blog MX'));
        $resultPage->getConfig()->getTitle()->prepend(__('Posts'));

        return $resultPage;
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->context->getAuthorization()->isAllowed('Mirasvit_Blog::blog_post');
    }
}
