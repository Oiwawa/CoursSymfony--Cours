<?php


namespace App\Repository;


use Doctrine\ORM\EntityRepository;

class IdeaRepository extends EntityRepository
{
    //Une fonction par requete avec DQL
    public function getAll_DQL()
    {
        $dql = "SELECT idea FROM App:Idea as idea WHERE idea.id < 10";
        //Execute le DQL + recupere les resultats
        $ideas = $this->getEntityManager()->createQuery($dql)->getResult();

        dump($ideas);
        exit();
    }

    //Une fonction par requete avec QueryBuilder
    public function getAll_QB($id)
    {
        $requete = $this->createQueryBuilder('idea');

        $requete->where('idea.id > 10')->orderBy('idea.id', 'DESC');

         $ideas = $requete->getQuery()->getResult();
        ##force l'affichage sous forme de tableau
        $ideas = $requete->getQuery()->getArrayResult();
        ##Si il trouve l'objet, soit il le renvoie soit il renvoie null
        $ideas = $requete->getQuery()->getOneOrNullResult();

        //Requete paramétré
        $requete->where('idea.id :id')->setParameter('id', $id);

        return $ideas;
    }
}