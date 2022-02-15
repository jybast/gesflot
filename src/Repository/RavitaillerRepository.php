<?php

namespace App\Repository;

use App\Entity\Ravitailler;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Ravitailler|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ravitailler|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ravitailler[]    findAll()
 * @method Ravitailler[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RavitaillerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ravitailler::class);
    }

    // /**
    //  * @return Ravitailler[] Returns an array of Ravitailler objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ravitailler
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
