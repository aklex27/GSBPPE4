<?php

namespace App\Repository;

use App\Entity\LigneFraisForfait;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method LigneFraisForfait|null find($id, $lockMode = null, $lockVersion = null)
 * @method LigneFraisForfait|null findOneBy(array $criteria, array $orderBy = null)
 * @method LigneFraisForfait[]    findAll()
 * @method LigneFraisForfait[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LigneFraisForfaitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LigneFraisForfait::class);
    }
    
    /**public function lingneffV($value){
        return $this->createQueryBuilder('ligneff')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery();
    }-*
    
    // /**
    //  * @return LigneFraisForfait[] Returns an array of LigneFraisForfait objects
    //  */
    
    public function findByExampleField()
    {
        return $this->createQueryBuilder('l')
            ->select('l')
            ->innerjoin('frais_forfait','f')
            ->where('l.frais_forfait_id'=='f.id')
            ->getQuery()
            ->getResult();
    }
    

    /*
    public function findOneBySomeField($value): ?LigneFraisForfait
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
