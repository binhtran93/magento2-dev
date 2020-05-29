<?php


namespace Smart\Blog\Model\ResourceModel\Category;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    protected $_idFieldName = 'entity_id';
    protected $_eventPrefix = 'smart_blog_category_collection';
    protected $_eventObject = 's_category_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Smart\Blog\Model\Category::class, \Smart\Blog\Model\ResourceModel\Category::class);
    }
}
