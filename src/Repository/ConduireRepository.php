<?php

namespace App\Repository;

use App\Entity\User;
use App\Entity\Conduire;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Polyfill\Intl\Icu\DateFormat\YearTransformer;

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
        parent::__construct($registry, Conduire::class, User::class);
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

    /**
     * Utilsation des véhicules
     */
    public function VehicleUsePerDriver($driver)
    {
        return $this->createQueryBuilder('c')
            ->select('v.d1_marque, COUNT(v.d1_marque) as count')

            ->leftjoin('c.conducteur', 'u')
            ->leftjoin('c.vehicule', 'v')
            ->andWhere('c.vehicule = v.id')
            ->andWhere('u.id = :val')
            ->setParameter('val', $driver)
            ->groupBy('v.d1_marque')
            ->getQuery()
            ->getResult();
    }

    /*
    * Recherche par vehicule
    */
    public function findLogbooksByVehicle(): ?array
    {
        return $this->createQueryBuilder('c')
            ->leftjoin('c.vehicule', 'v')
            ->leftjoin('c.conducteur', 'u')

            ->getQuery()
            ->getResult();
    }

    /*
    * Recherche par conducteur
    */
    public function findLogbooksByDriver($value): ?array
    {
        return $this->createQueryBuilder('c')
            ->leftjoin('c.conducteur', 'u')
            ->leftjoin('c.vehicule', 'v')
            ->andWhere('u.id = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult();
    }

    /*
    * Recherche par conducteur
    */
    public function TotalDistanceByDriver($value): ?array
    {
        return $this->createQueryBuilder('c')

            ->leftjoin('c.conducteur', 'usr')
            ->leftjoin('c.vehicule', 'veh')
            ->andWhere('usr.id = :val')
            ->setParameter('val', $value)
            ->groupBy(substr('c.realiserAt', 0, 4))
            ->getQuery()
            ->getResult();
    }

    public function DistanceByDriverByYear($value)
    {
        return $this->createQueryBuilder('c')
            ->select('c.realiser_at')
            ->addSelect('SUM(c.distance)')
            ->addSelect('SUBSTRING(c.realiser_at, 1, 4) as Year')
            ->leftJoin('c.conducteur', 'u')
            ->where('c.conducteur = :id')
            ->setParameter('id', $value)
            ->groupBy('Year')
            ->getQuery()
            ->getResult();

        /* $query = $this->getEntityManager()->createQuery("
            SELECT SUM(c.distance) FROM App\Entity\Conduire c 
        ");
        return $query->getResult();*/
    }

    public function DistanceByDriver($value, $year = null)
    {
        return $this->createQueryBuilder('c')

            ->addSelect('SUM(c.distance)')

            ->leftJoin('c.conducteur', 'u')
            ->where('c.conducteur = :id')
            ->andWhere('SUBSTRING(c.realiser_at, 1, 4) = :year')
            ->setParameter('id', $value)
            ->setParameter('year', $year)

            ->getQuery()
            ->getSingleResult();
    }

    public function countByYear($driver)
    {
        $query = $this->createQueryBuilder('c')
            ->select('SUBSTRING(c.realiser_at, 1, 4) as years, COUNT(c) as count, SUM(c.distance) as km')
            ->leftJoin('c.conducteur', 'u')
            ->where('c.conducteur = :id')
            ->setParameter('id', $driver)
            ->groupBy('years');
        return $query->getQuery()->getResult();
    }
}
