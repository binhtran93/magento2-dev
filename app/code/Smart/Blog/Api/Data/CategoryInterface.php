<?php

namespace Smart\Blog\Api\Data;

interface CategoryInterface
{
    const ID    = 'entity_id';
    const NAME  = 'name';

    /**
     * @return int
     */
    public function getId();

    public function getName();

    public function setName($value);
}
