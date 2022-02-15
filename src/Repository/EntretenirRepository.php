<?php

namespace App\Repository;

use App\Entity\Entretenir;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Entretenir|null find($id, $lockMode = null, $lockVersion = null)
 * @method Entretenir|null findOneBy(array $criteria, array $orderBy = null)
 * @method Entretenir[]    findAll()
 * @method Entretenir[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EntretenirRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Entretenir::class);
    }

    // /**
    //  * @return Entretenir[] Returns an array of Entretenir objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Entretenir
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
