<?php


namespace App\Repository\TP;


use Doctrine\ORM\EntityRepository;

class IdeaRepository extends EntityRepository
{

    public function getAll($page = 1)
    {
        //Recupère seulement les idées publiées
        $requete = $this->createQueryBuilder('idea')
            ->where('idea.isPublished = :isPublished')->setParameter('isPublished', true)
            ->orderBy('idea.dateCreated', 'DESC')
            ->setFirstResult(($page-1) * 100)
            ->setMaxResults(100);

        return $ideas = $requete->getQuery()->getResult();
    }


}