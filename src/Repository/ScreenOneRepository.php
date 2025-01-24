<?php

namespace App\Repository;

use App\Entity\ScreenOne;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ScreenOne>
 */
class ScreenOneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ScreenOne::class);
    }

    public function search(string $query) {
        return $this->createQueryBuilder('s')
            ->where('s.title LIKE :query')->setParameter('query', '%'.$query.'%')
            ->orWhere('s.id = :id')->setParameter('id', (int) $query)
            ->orWhere('s.notes = :notes')->setParameter('notes', '%'.$query.'%')
            ->getQuery()->getResult();
    }
}
