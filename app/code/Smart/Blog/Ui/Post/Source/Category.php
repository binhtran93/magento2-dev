<?php

namespace Smart\Blog\Ui\Post\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Smart\Blog\Api\Data\CategoryInterface;
use Smart\Blog\Api\Repository\CategoryRepositoryInterface;

class Category implements OptionSourceInterface
{
    private $categoryRepository;

    public function __construct(
        CategoryRepositoryInterface $categoryRepository
    ) {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function toOptionArray()
    {
        $collection = $this->categoryRepository->getCollection();
        $options = [];
        foreach ($collection as $category) {
            $options[] = [
                'label' => $category->getName(),
                'value' => $category->getId()
            ];
        }

        return $options;
    }
}
