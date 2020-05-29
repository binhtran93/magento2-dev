<?php


namespace Smart\Blog\Model;


use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;
use Smart\Blog\Api\Data\PostInterface;

class Post extends AbstractModel implements IdentityInterface, PostInterface
{

    const CACHE_TAG = 'smart_blog_post';

    protected $_cacheTag = 'smart_blog_post';
    protected $_eventPrefix = 'smart_blog_post';

    protected function _construct()
    {
        $this->_init(ResourceModel\Post::class);
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

    /**
     * @inheritDoc
     */
    public function getType()
    {
        // TODO: Implement getType() method.
    }

    /**
     * @inheritDoc
     */
    public function setType($value)
    {
        // TODO: Implement setType() method.
    }

    /**
     * @inheritDoc
     */
    public function getStatus()
    {
        // TODO: Implement getStatus() method.
    }

    /**
     * @inheritDoc
     */
    public function setStatus($value)
    {
        // TODO: Implement setStatus() method.
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        // TODO: Implement getName() method.
    }

    /**
     * @inheritDoc
     */
    public function setName($value)
    {
        // TODO: Implement setName() method.
    }

    /**
     * @inheritDoc
     */
    public function getContent()
    {
        // TODO: Implement getContent() method.
    }

    /**
     * @inheritDoc
     */
    public function setContent($value)
    {
        // TODO: Implement setContent() method.
    }

    /**
     * @inheritDoc
     */
    public function getCreatedAt()
    {
        // TODO: Implement getCreatedAt() method.
    }

    /**
     * @inheritDoc
     */
    public function setCreatedAt($value)
    {
        // TODO: Implement setCreatedAt() method.
    }

    /**
     * @inheritDoc
     */
    public function getCategoryIds()
    {
        // TODO: Implement getCategoryIds() method.
    }

    /**
     * @inheritDoc
     */
    public function setCategoryIds(array $value)
    {
        // TODO: Implement setCategoryIds() method.
    }

    /**
     * @inheritDoc
     */
    public function getStoreIds()
    {
        // TODO: Implement getStoreIds() method.
    }

    /**
     * @inheritDoc
     */
    public function setStoreIds(array $value)
    {
        // TODO: Implement setStoreIds() method.
    }

    /**
     * @inheritDoc
     */
    public function getProductIds()
    {
        // TODO: Implement getProductIds() method.
    }

    /**
     * @inheritDoc
     */
    public function setProductIds(array $value)
    {
        // TODO: Implement setProductIds() method.
    }
}
