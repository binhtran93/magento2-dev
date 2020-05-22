<?php

namespace Vendor\ModuleName\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Vendor\ModuleName\Model\ResourceModel\Post\Collection;

class Display extends Template
{
    protected $collection;

    public function __construct(
        Context $context,
        Collection $collection
    ) {
        $this->collection = $collection;
        parent::__construct($context);
    }

    public function sayHello()
    {
        return __('Hello World');
    }

    public function getPostCollection()
    {
        return $this->collection;
    }
}
