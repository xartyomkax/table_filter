<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

class ProductRepository extends ServiceEntityRepository
{
    private $manager;

    public function __construct(ManagerRegistry $registry, EntityManagerInterface $manager)
    {
        parent::__construct($registry, Product::class);
        $this->manager = $manager;
    }

    public function findAllByConditions(
        array $requestParams,
        ?string $sort,
        ?int $limit = null,
        ?int $offset = null
    ): array {
        $queryBuilder = $this->createQueryBuilder('p')
            ->setFirstResult($offset)
            ->setMaxResults($limit);

        if (!empty($requestParams['productName'])) {
            $queryBuilder
                ->andWhere('p.productName LIKE :productName')
                ->setParameter(':productName', '%' . $requestParams['productName'] . '%');
        }

        if (!empty($requestParams['category'])) {
            $queryBuilder
                ->andWhere('p.category LIKE :category')
                ->setParameter(':category', '%' . $requestParams['category'] . '%');
        }

        if (!empty($requestParams['size'])) {
            $queryBuilder
                ->andWhere('p.size = :size')
                ->setParameter(':size', $requestParams['size']);
        }

        if (!empty($sort)) {
            $orderAttribute = 'p.' . ltrim($sort, '-');
            $queryBuilder->orderBy($orderAttribute, strpos($sort, '-') === 0 ? 'DESC' : 'ASC');
        }

        return $queryBuilder->getQuery()->getResult();
    }
}
