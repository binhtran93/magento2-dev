<?php


namespace Smart\Blog\Model\ResourceModel\Post;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    protected $_idFieldName = 'entity_id';
    protected $_eventPrefix = 'smart_blog_post_collection';
    protected $_eventObject = 's_post_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Smart\Blog\Model\Post::class, \Smart\Blog\Model\ResourceModel\Post::class);
    }
}
