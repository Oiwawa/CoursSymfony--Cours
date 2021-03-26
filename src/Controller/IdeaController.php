<?php


namespace App\Controller;



use App\Entity\Idea;
use Doctrine\ORM\EntityManagerInterface;
use PhpParser\Node\Expr\Cast\Object_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class IdeaController
 * @package App\Controller\TP
 * @Route(path="TP/", name="TP_")
 */
class IdeaController extends AbstractController
{
    /**
     * @Route(path="liste", name="liste", methods={"GET"})
     */
    public function liste(){

        return $this->render('TP/idea/liste.html.twig');
    }

    /**
     * @Route(path="detail/{id}", name="detail", requirements={"id":"\d"}, methods={"GET"})
     * @param EntityManagerInterface $entityManager
     */
    public function detail(EntityManagerInterface $entityManager){

            $idea = new Idea();
            $idea->setTitle("Titre");
            $idea->setDescription('Description');
            $idea->setAuthor("Auteur");
            $idea->setDateCreated(new \DateTime('now'));
            $idea->setIsPublished(true);

            //Demande à Doctrine d'écouter l'entité IDEA
            $entityManager->persist($idea);

            //Validation de la transaction
            $entityManager->flush();

            //Récupération

            //Récupération de l'objet IDEA en BDD
            $idea = $entityManager->getRepository('App:Idea')->find('4295561');


            //Modification des données

            $idea->setTitle("Nouveau Titre");
            $idea->setAuthor("Nouveau Auteur");
            //Validation de la transaction
            $entityManager->flush();

            //Suppression
            $idea = $entityManager->getRepository('App:Idea')->find('4295561');
            $entityManager->remove($idea);


            //Requete préparée

            $entityManager->getRepository('App:Idea')->getAll('');
        return $this->render('TP/idea/detail.html.twig', ['idea' => $idea]);
    }
}