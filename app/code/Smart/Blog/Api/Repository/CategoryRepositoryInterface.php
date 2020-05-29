<?php

namespace Smart\Blog\Api\Repository;

use Smart\Blog\Api\Data\CategoryInterface;
use Smart\Blog\Model\ResourceModel\Category\Collection;

interface CategoryRepositoryInterface
{
    /**
     * @return Collection | CategoryInterface[]
     */
    public function getCollection();

    /**
     * @param CategoryInterface $model
     *
     * @return CategoryInterface
     */
    public function save(CategoryInterface $model);

    /**
     * @param int $id
     *
     * @return CategoryInterface|false
     */
    public function get($id);

    /**
     * @param CategoryInterface $model
     *
     * @return bool
     */
    public function delete(CategoryInterface $model);
}
