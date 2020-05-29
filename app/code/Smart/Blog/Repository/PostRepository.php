<?php


namespace Smart\Blog\Repository;

use Smart\Blog\Api\Data\PostInterface;
use Smart\Blog\Api\Repository\PostRepositoryInterface;
use Smart\Blog\Model\ResourceModel\Category\Collection;
use Smart\Blog\Api\Data\PostInterfaceFactory;

class PostRepository implements PostRepositoryInterface
{

    /** @var Collection $collection */
    private $collection;

    private $factory;

    /**
     * @param Collection $collection
     */
    public function __construct(Collection $collection, PostInterfaceFactory $factory)
    {
        $this->collection = $collection;
        $this->factory = $factory;
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
     */
    public function save(PostInterface $model)
    {
        // TODO: Implement save() method.
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
