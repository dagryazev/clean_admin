<?php

namespace App\Repository;

use App\Entity\Categorii;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Categorii|null find($id, $lockMode = null, $lockVersion = null)
 * @method Categorii|null findOneBy(array $criteria, array $orderBy = null)
 * @method Categorii[]    findAll()
 * @method Categorii[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoriiRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Categorii::class);
    }

    // /**
    //  * @return Categorii[] Returns an array of Categorii objects
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

    /*
    public function findOneBySomeField($value): ?Categorii
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
