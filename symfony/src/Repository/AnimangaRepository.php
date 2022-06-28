<?php

namespace App\Repository;

use App\Entity\Animanga;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Animanga|null find($id, $lockMode = null, $lockVersion = null)
 * @method Animanga|null findOneBy(array $criteria, array $orderBy = null)
 * @method Animanga[]    findAll()
 * @method Animanga[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnimangaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Animanga::class);
    }

    // /**
    //  * @return Animanga[] Returns an array of Animanga objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Animanga
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
