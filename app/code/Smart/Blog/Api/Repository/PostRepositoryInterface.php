<?php

namespace Smart\Blog\Api\Repository;

use Smart\Blog\Api\Data\PostInterface;
use Smart\Blog\Model\ResourceModel\Category\Collection;

interface PostRepositoryInterface
{
    /**
     * @return Collection | PostInterface[]
     */
    public function getCollection();

    /**
     * @return PostInterface
     */
    public function createModel();

    /**
     * @param PostInterface $model
     *
     * @return PostInterface
     */
    public function save(PostInterface $model);

    /**
     * @param int $id
     *
     * @return PostInterface|false
     */
    public function get($id);

    /**
     * @param PostInterface $model
     *
     * @return bool
     */
    public function delete(PostInterface $model);

}
