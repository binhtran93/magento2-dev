<?php


namespace Smart\Blog\Repository;


use Smart\Blog\Api\Data\CategoryInterface;
use Smart\Blog\Api\Repository\CategoryRepositoryInterface;
use Smart\Blog\Model\ResourceModel\Category\Collection;

class CategoryRepository implements CategoryRepositoryInterface
{

    /** @var Collection $collection */
    private $collection;

    /**
     * CategoryRepository constructor.
     * @param Collection $collection
     */
    public function __construct(Collection $collection)
    {
        $this->collection = $collection;
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
    public function save(CategoryInterface $model)
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
    public function delete(CategoryInterface $model)
    {
        // TODO: Implement delete() method.
    }
}
