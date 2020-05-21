<?php

namespace Vendor\ModuleName\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    protected $_pageFactory;

    public function __construct(
        Context $context,
        PageFactory $pageFactory
    ) {
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    /**
     * @inheritDoc
     */
    public function execute()
    {
//        echo "111";die;
        return $this->_pageFactory->create();
//        $block = $this->_view->getLayout()->createBlock('Vendor\ModuleName\Block\Index');
//        $block->setTemplate('Vendor_ModuleName::index.phtml');
//        $this->getResponse()->appendBody($block->toHtml());
    }
}
