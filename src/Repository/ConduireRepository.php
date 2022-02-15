<?php

namespace App\Repository;

use App\Entity\Conduire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Conduire|null find($id, $lockMode = null, $lockVersion = null)
 * @method Conduire|null findOneBy(array $criteria, array $orderBy = null)
 * @method Conduire[]    findAll()
 * @method Conduire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConduireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Conduire::class);
    }

    // /**
    //  * @return Conduire[] Returns an array of Conduire objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Conduire
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
