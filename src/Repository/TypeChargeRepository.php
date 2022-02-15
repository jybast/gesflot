<?php

namespace App\Repository;

use App\Entity\TypeCharge;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeCharge|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeCharge|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeCharge[]    findAll()
 * @method TypeCharge[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeChargeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeCharge::class);
    }

    // /**
    //  * @return TypeCharge[] Returns an array of TypeCharge objects
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
    public function findOneBySomeField($value): ?TypeCharge
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
