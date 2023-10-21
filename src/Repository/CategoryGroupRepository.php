<?php

namespace App\Repository;

use App\Entity\CategoryGroup;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CategoryGroup>
 *
 * @method CategoryGroup|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoryGroup|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoryGroup[]    findAll()
 * @method CategoryGroup[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryGroupRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategoryGroup::class);
    }

    /**
     * @return CategoryGroup[] Returns an array of CategoryGroup objects
     */
    public function findAllWithServices(): array
    {
        return $this->createQueryBuilder('c')
            ->leftJoin('c.services', 'services')
            ->select('c', 'services')
            ->orderBy('c.name', 'ASC')
//            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

//    /**
//     * @return CategoryGroup[] Returns an array of CategoryGroup objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CategoryGroup
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
