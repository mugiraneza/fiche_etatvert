<?php

namespace App\Repository;

use App\Entity\Regularisation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Regularisation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Regularisation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Regularisation[]    findAll()
 * @method Regularisation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RegularisationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Regularisation::class);
    }

    // /**
    //  * @return Regularisation[] Returns an array of Regularisation objects
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
    public function findOneBySomeField($value): ?Regularisation
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
