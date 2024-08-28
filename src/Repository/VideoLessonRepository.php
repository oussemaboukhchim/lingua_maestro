<?php

namespace App\Repository;

use App\Entity\VideoLesson;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<VideoLesson>
 *
 * @method VideoLesson|null find($id, $lockMode = null, $lockVersion = null)
 * @method VideoLesson|null findOneBy(array $criteria, array $orderBy = null)
 * @method VideoLesson[]    findAll()
 * @method VideoLesson[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VideoLessonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VideoLesson::class);
    }

//    /**
//     * @return VideoLesson[] Returns an array of VideoLesson objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?VideoLesson
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
