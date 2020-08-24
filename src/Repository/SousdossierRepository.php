<?php

namespace App\Repository;

use App\Entity\Sousdossier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Sousdossier|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sousdossier|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sousdossier[]    findAll()
 * @method Sousdossier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SousdossierRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sousdossier::class);
    }

    // /**
    //  * @return Sousdossier[] Returns an array of Sousdossier objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Sousdossier
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
