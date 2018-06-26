<?php

namespace App\Repository;

use App\Entity\Stationnement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Stationnement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Stationnement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Stationnement[]    findAll()
 * @method Stationnement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StationnementRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Stationnement::class);
    }

//    /**
//     * @return Stationnement[] Returns an array of Stationnement objects
//     */
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
    public function findOneBySomeField($value): ?Stationnement
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
