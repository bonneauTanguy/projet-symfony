<?php

namespace App\Repository;

use App\Entity\TypeParent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeParent|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeParent|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeParent[]    findAll()
 * @method TypeParent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeParentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeParent::class);
    }

    // /**
    //  * @return TypeParent[] Returns an array of TypeParent objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeParent
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
