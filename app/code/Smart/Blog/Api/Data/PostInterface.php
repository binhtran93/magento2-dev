<?php

namespace Smart\Blog\Api\Data;

use Magento\Catalog\Model\ResourceModel\Product\Collection;

interface PostInterface
{
    const ID = 'entity_id';

    const NAME             = 'name';
    const TYPE             = 'type';
    const STATUS           = 'status';
    const CONTENT          = 'content';

    const CREATED_AT = 'created_at';

    const CATEGORY_IDS = 'category_ids';
    const STORE_IDS    = 'store_ids';
    const PRODUCT_IDS  = 'product_ids';

    const TYPE_POST     = 'post';
    const TYPE_REVISION = 'revision';

    const STATUS_DRAFT          = 0;
    const STATUS_PENDING_REVIEW = 1;
    const STATUS_PUBLISHED      = 2;

    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getType();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setType($value);

    /**
     * @return string
     */
    public function getStatus();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setStatus($value);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setName($value);

    /**
     * @return string
     */
    public function getContent();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setContent($value);

    /**
     * @return string
     */
    public function getCreatedAt();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setCreatedAt($value);

    /**
     * @return mixed
     */
    public function getCategoryIds();

    /**
     * @param mixed $value
     *
     * @return $this
     */
    public function setCategoryIds(array $value);

    /**
     * @return mixed
     */
    public function getStoreIds();

    /**
     * @param mixed $value
     *
     * @return $this
     */
    public function setStoreIds(array $value);

    /**
     * @return mixed
     */
    public function getProductIds();

    /**
     * @param mixed $value
     *
     * @return $this
     */
    public function setProductIds(array $value);
}
