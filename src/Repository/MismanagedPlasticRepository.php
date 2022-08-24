<?php

namespace App\Repository;

use App\Entity\MismanagedPlastic;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MismanagedPlastic>
 *
 * @method MismanagedPlastic|null find($id, $lockMode = null, $lockVersion = null)
 * @method MismanagedPlastic|null findOneBy(array $criteria, array $orderBy = null)
 * @method MismanagedPlastic[]    findAll()
 * @method MismanagedPlastic[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MismanagedPlasticRepository extends ServiceEntityRepository
{

    public bool $flush = false;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MismanagedPlastic::class);
    }

    public function add(MismanagedPlastic $entity, bool $flush): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(MismanagedPlastic $entity, bool $flush): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return MismanagedPlastic[] Returns an array of MismanagedPlastic objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?MismanagedPlastic
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
