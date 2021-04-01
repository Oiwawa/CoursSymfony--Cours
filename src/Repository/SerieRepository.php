<?php

namespace App\Repository;

use App\Entity\Serie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Serie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Serie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Serie[]    findAll()
 * @method Serie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SerieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Serie::class);
    }


    public function findWithSeasons($limit, $numPage){
        $qb = $this->createQueryBuilder('ser')
            ->join('ser.seasons','sea')
            ->addSelect('sea')
            ->setMaxResults($limit)
            ->setFirstResult(($numPage-1) *10);
        $query = $qb->getQuery();
        return new Paginator($query);
    }

    public function nbPages($nbLine){
        $qb = $this->createQueryBuilder('ser');
        $query = $qb->getQuery();
        return ceil(count($query->getResult())/$nbLine);
    }
}
