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
        return $this->getData(self::TYPE);
    }

    /**
     * @inheritDoc
     */
    public function setType($value)
    {
        return $this->setData(self::TYPE, $value);
    }

    /**
     * @inheritDoc
     */
    public function getStatus()
    {
        return $this->getData(self::STATUS);
    }

    /**
     * @inheritDoc
     */
    public function setStatus($value)
    {
        return $this->setData(self::STATUS, $value);
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * @inheritDoc
     */
    public function setName($value)
    {
        return $this->setData(self::NAME, $value);
    }

    /**
     * @inheritDoc
     */
    public function getContent()
    {
        return $this->getData(self::CONTENT);
    }

    /**
     * @inheritDoc
     */
    public function setContent($value)
    {
        return $this->setData(self::CONTENT, $value);
    }

    /**
     * @inheritDoc
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * @inheritDoc
     */
    public function setCreatedAt($value)
    {
        return $this->setData(self::CREATED_AT, $value);
    }

    /**
     * @inheritDoc
     */
    public function getCategoryIds()
    {
        return $this->getData(self::CATEGORY_IDS);
    }

    /**
     * @inheritDoc
     */
    public function setCategoryIds(array $value)
    {
        return $this->setData(self::CATEGORY_IDS, $value);
    }

    /**
     * @inheritDoc
     */
    public function getStoreIds()
    {
        return $this->getData(self::STORE_IDS);
    }

    /**
     * @inheritDoc
     */
    public function setStoreIds(array $value)
    {
        return $this->setData(self::STORE_IDS, $value);
    }

    /**
     * @inheritDoc
     */
    public function getProductIds()
    {
        return $this->getData(self::PRODUCT_IDS);
    }

    /**
     * @inheritDoc
     */
    public function setProductIds(array $value)
    {
        return $this->setData(self::PRODUCT_IDS, $value);
    }
}
