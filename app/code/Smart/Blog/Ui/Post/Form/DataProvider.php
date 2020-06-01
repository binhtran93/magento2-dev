<?php

namespace Smart\Blog\Ui\Post\Form;

use Magento\Catalog\Model\Product\Attribute\Source\Status;
use Magento\Ui\DataProvider\AbstractDataProvider;
use Smart\Blog\Api\Data\PostInterface;
use Smart\Blog\Api\Repository\PostRepositoryInterface;

class DataProvider extends AbstractDataProvider
{
    /**
     * @var PostRepositoryInterface
     */
    private $postRepository;

    public function __construct(
        PostRepositoryInterface $postRepository,
        Status $status,
        $name,
        $primaryFieldName,
        $requestFieldName,
        array $meta = [],
        array $data = []
    ) {
        $this->postRepository = $postRepository;
        $this->collection     = $this->postRepository->getCollection();
        $this->status         = $status;

        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }


    /**
     * {@inheritdoc}
     */
    public function getData()
    {
        $result = [];

        foreach ($this->collection as $post) {
            $post = $this->postRepository->get($post->getId());

            $result[$post->getId()] = [
                PostInterface::ID               => $post->getId(),
                PostInterface::STATUS           => $post->getStatus(),
                PostInterface::CREATED_AT       => $post->getCreatedAt(),
                PostInterface::NAME             => $post->getName(),
                PostInterface::CONTENT          => $post->getContent(),
                PostInterface::CATEGORY_IDS     => $post->getCategoryIds(),
                PostInterface::STORE_IDS        => $post->getStoreIds(),
            ];

//            $result[$post->getId()]['links']['products'] = [];
//            foreach ($post->getRelatedProducts() as $product) {
//                $result[$post->getId()]['links']['products'][] = [
//                    'id'        => $product->getId(),
//                    'name'      => $product->getName(),
//                    'status'    => $this->status->getOptionText($product->getStatus()),
//                    'thumbnail' => $this->imageHelper->init($product, 'product_listing_thumbnail')->getUrl(),
//                ];
//            }
        }

        return $result;
    }
}
