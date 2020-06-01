<?php

namespace Smart\Blog\Repository;

use Smart\Blog\Api\Data\PostInterface;
use Smart\Blog\Api\Data\PostInterfaceFactory;
use Smart\Blog\Api\Repository\PostRepositoryInterface;
use Smart\Blog\Model\Post;
use Smart\Blog\Model\ResourceModel\Category\Collection;
use Smart\Blog\Model\ResourceModel\Post as PostResourceModel;

class PostRepository implements PostRepositoryInterface
{

    /** @var Collection $collection */
    private $collection;

    private $factory;

    private $resourceModel;

    /**
     * @param Collection $collection
     * @param PostInterfaceFactory $factory
     * @param PostResourceModel $resourceModel
     */
    public function __construct(Collection $collection, PostInterfaceFactory $factory, PostResourceModel $resourceModel)
    {
        $this->collection = $collection;
        $this->factory = $factory;
        $this->resourceModel = $resourceModel;
    }

    /**
     * @inheritDoc
     */
    public function getCollection()
    {
        return $this->collection;
    }

    /**
     * @inheritDoc
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     */
    public function save(PostInterface $model)
    {
        if (!$model->getType()) {
            $model->setType(\Mirasvit\Blog\Api\Data\PostInterface::TYPE_POST);
        }

        if ($model->getCategoryIds()) {
            $categoryIds = array_filter($model->getCategoryIds());
            $model->setCategoryIds($categoryIds);
        }

        /** @var Post $model */

        $this->resourceModel->save($model);
    }

    /**
     * @inheritDoc
     */
    public function get($id)
    {
        // TODO: Implement get() method.
    }

    /**
     * @inheritDoc
     */
    public function delete(PostInterface $model)
    {
        // TODO: Implement delete() method.
    }

    /**
     * @inheritDoc
     */
    public function createModel()
    {
        return $this->factory->create();
    }
}
