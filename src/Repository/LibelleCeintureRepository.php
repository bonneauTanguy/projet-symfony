<?php

namespace App\Repository;

use App\Entity\LibelleCeinture;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LibelleCeinture|null find($id, $lockMode = null, $lockVersion = null)
 * @method LibelleCeinture|null findOneBy(array $criteria, array $orderBy = null)
 * @method LibelleCeinture[]    findAll()
 * @method LibelleCeinture[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LibelleCeintureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LibelleCeinture::class);
    }

    // /**
    //  * @return LibelleCeinture[] Returns an array of LibelleCeinture objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LibelleCeinture
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
