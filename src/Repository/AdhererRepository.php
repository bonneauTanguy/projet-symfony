<?php

namespace App\Repository;

use App\Entity\Adherer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Adherer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Adherer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Adherer[]    findAll()
 * @method Adherer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdhererRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Adherer::class);
    }

    // /**
    //  * @return Adherer[] Returns an array of Adherer objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Adherer
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
