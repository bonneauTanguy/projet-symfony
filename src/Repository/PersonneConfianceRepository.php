<?php

namespace App\Repository;

use App\Entity\PersonneConfiance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PersonneConfiance|null find($id, $lockMode = null, $lockVersion = null)
 * @method PersonneConfiance|null findOneBy(array $criteria, array $orderBy = null)
 * @method PersonneConfiance[]    findAll()
 * @method PersonneConfiance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonneConfianceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PersonneConfiance::class);
    }

    // /**
    //  * @return PersonneConfiance[] Returns an array of PersonneConfiance objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PersonneConfiance
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
