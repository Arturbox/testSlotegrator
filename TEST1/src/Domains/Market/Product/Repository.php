<?php

namespace App\Domains\Market\Product;

use Doctrine\ORM\EntityManager;

readonly class Repository
{
    public function __construct(private EntityManager $em)
    {
    }

    /**
     * @return array<Product>
     */
    public function list(array $queryParams, $authenticated): array
    {
        return $this->em->createQueryBuilder()->select('products')->from(
            Product::class,
            'product'
        )->where($queryParams)->where($authenticated)->getQuery()->getResult();
    }
}
