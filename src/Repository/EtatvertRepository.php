<?php

namespace App\Repository;

use App\Entity\Etatvert;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Etatvert|null find($id, $lockMode = null, $lockVersion = null)
 * @method Etatvert|null findOneBy(array $criteria, array $orderBy = null)
 * @method Etatvert[]    findAll()
 * @method Etatvert[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EtatvertRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Etatvert::class);
    }

//     /**
////      * @return Etatvert[] Returns an array of Etatvert objects
////      */
////    public function findByExampleField($value)
////    {
////        return $this->createQueryBuilder('e')
////            ->andWhere('e.exampleField = :val')
////            ->setParameter('val', $value)
////            ->orderBy('e.id', 'ASC')
////            ->setMaxResults(10)
////            ->getQuery()
////            ->getResult()
////        ;
////    }

    /*
    public function findOneBySomeField($value): ?Etatvert
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
