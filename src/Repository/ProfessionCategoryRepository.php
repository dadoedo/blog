<?php

namespace App\Repository;

use App\Entity\ProfessionCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProfessionCategory>
 *
 * @method ProfessionCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProfessionCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProfessionCategory[]    findAll()
 * @method ProfessionCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProfessionCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProfessionCategory::class);
    }

//    /**
//     * @return ProfessionCategory[] Returns an array of ProfessionCategory objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ProfessionCategory
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
