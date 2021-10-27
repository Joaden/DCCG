<?php

namespace App\Repository;

use App\Entity\IsValid;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method IsValid|null find($id, $lockMode = null, $lockVersion = null)
 * @method IsValid|null findOneBy(array $criteria, array $orderBy = null)
 * @method IsValid[]    findAll()
 * @method IsValid[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IsValidRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IsValid::class);
    }

    // /**
    //  * @return IsValid[] Returns an array of IsValid objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?IsValid
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
