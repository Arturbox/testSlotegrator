<?php

namespace App\Domains\Market\Product;

use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'Resource',
    title: "Resource",
    description: "Product Resource",
    required: ['name', 'groups'],
)]
class Resource
{
    #[OA\Property(example: 1)]
    public int $id;
    #[OA\Property(example: 'Product 1')]
    public string $name;
    #[OA\Property(example: 'Product Description 1')]
    public string $description;
    #[OA\Property(
        property: 'image_urls',
        type: 'array',
        items: new OA\Items(
            type: 'string'
        ),
    )]
    public array $image_urls;
    #[OA\Property(example: 'Category 1')]
    public string $category;
    
    public function __construct(Product $product, array $urls)
    {
        $this->fillProperties($product, $urls);
    }

    private function fillProperties(Product $product, array $urls): void
    {
        $this->id = $product->getId();
        $this->name = $product->getName();
        $this->description = $product->getDescription();
        $this->category = $product->getCategory()->getName();
        $this->image_urls = $urls;
    }
}