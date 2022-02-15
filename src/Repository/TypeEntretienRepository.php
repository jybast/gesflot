<?php

namespace App\Repository;

use App\Entity\TypeEntretien;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeEntretien|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeEntretien|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeEntretien[]    findAll()
 * @method TypeEntretien[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeEntretienRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeEntretien::class);
    }

    // /**
    //  * @return TypeEntretien[] Returns an array of TypeEntretien objects
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
    public function findOneBySomeField($value): ?TypeEntretien
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
