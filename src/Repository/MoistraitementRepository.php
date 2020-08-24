<?php

namespace App\Repository;

use App\Entity\Moistraitement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Moistraitement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Moistraitement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Moistraitement[]    findAll()
 * @method Moistraitement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MoistraitementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Moistraitement::class);
    }

    // /**
    //  * @return Moistraitement[] Returns an array of Moistraitement objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Moistraitement
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
