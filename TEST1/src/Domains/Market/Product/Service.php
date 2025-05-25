<?php

namespace App\Domains\Market\Product;

use App\Common\FileService\FileStorageRepository;
use Exception;

readonly class Service
{
    public function __construct(
        private Repository $productRepository,
        private FileStorageRepository $fileStorageRepository
    ) {
    }

    /**
     * @return array<Resource>
     * @throws Exception
     */
    public function list(array $queryParams, bool $authenticated): array
    {
        $products = $this->productRepository->list($queryParams, $authenticated);

        $result = [];

        foreach ($products as $product) {
            $imageUrls = [];
            foreach ($product->getImages() as $image) {
                $this->fileStorageRepository->useStorage($image->getType());
                $imageUrls[] = $this->fileStorageRepository->getUrl($product->getImageFileName());
            }

            $result[] = new Resource($product, $imageUrls);
        }

        return $result;
    }
}