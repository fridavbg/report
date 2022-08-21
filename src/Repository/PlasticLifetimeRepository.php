<?php

namespace App\Repository;

use App\Entity\PlasticLifetime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PlasticLifetime>
 *
 * @method PlasticLifetime|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlasticLifetime|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlasticLifetime[]    findAll()
 * @method PlasticLifetime[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlasticLifetimeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlasticLifetime::class);
    }

    public function add(PlasticLifetime $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(PlasticLifetime $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return PlasticLifetime[] Returns an array of PlasticLifetime objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PlasticLifetime
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
