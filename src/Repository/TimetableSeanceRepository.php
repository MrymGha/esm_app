<?php

namespace App\Repository;

use App\Entity\TimetableSession;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TimetableSession>
 *
 * @method TimetableSession|null find($id, $lockMode = null, $lockVersion = null)
 * @method TimetableSession|null findOneBy(array $criteria, array $orderBy = null)
 * @method TimetableSession[]    findAll()
 * @method TimetableSession[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TimetableSessionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TimetableSession::class);
    }

    //    /**
    //     * @return TimetableSession[] Returns an array of TimetableSession objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('t')
    //            ->andWhere('t.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('t.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?TimetableSession
    //    {
    //        return $this->createQueryBuilder('t')
    //            ->andWhere('t.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
