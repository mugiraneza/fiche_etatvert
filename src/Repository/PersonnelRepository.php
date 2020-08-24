<?php

namespace App\Repository;

use App\Entity\Etat;
use App\Entity\Personnel;
use App\Entity\Sousdossier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use phpDocumentor\Reflection\Types\Integer;

/**
 * @method Personnel|null find($id, $lockMode = null, $lockVersion = null)
 * @method Personnel|null findOneBy(array $criteria, array $orderBy = null)
 * @method Personnel[]    findAll()
 * @method Personnel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonnelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Personnel::class);
    }

    // /**
    //  * @return Personnel[] Returns an array of Personnel objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /**
     * @param $dossierid
     * @return mixed
     */
    public function showStateGreen($dossierid)
    {
        $qb = $this->createQueryBuilder('pp');
        $qb ->select(
            'pp.id',
            'pp.nom',
            'pp.prenom' ,
            'pp.nationalite',
            'pp.sex',
            'pp.situationfamille',
            'pp.enfantscharge',
            'pp.nombre_epoux_se',
            'pp.numsecuritesociale')
            ->leftJoin(Sousdossier::class,'ss','WITH','pp.id=ss.personnel')
            ->join(Etat::class,'et','WITH','et.sousdossier=ss.id')
            ->andWhere('et.moistraitement=16')
            ->andwhere('ss.id=:dossierid')
            ->setParameter(':dossierid',$dossierid);

        return $qb->getQuery()->getResult();

    }
    /*
    public function findOneBySomeField($value): ?Personnel
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
