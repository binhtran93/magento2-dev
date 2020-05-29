<?php


namespace Smart\Blog\Model;


use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;
use Smart\Blog\Api\Data\CategoryInterface;

class Category extends AbstractModel implements IdentityInterface, CategoryInterface
{

    const CACHE_TAG = 'smart_blog_category';

    protected $_cacheTag = 'smart_blog_category';
    protected $_eventPrefix = 'smart_blog_category';

    protected function _construct()
    {
        $this->_init(ResourceModel\Category::class);
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }

    public function getName()
    {
        return $this->getData(self::NAME);
    }

    public function setName($value)
    {
        return $this->setData(self::NAME, $value);
    }
}
