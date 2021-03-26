<?php


namespace App\Controller\TP;



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
    public function liste(EntityManagerInterface $entityManager){

        $ideas = $entityManager->getRepository('App:Idea')->getAll(1);

        return $this->render('TP/idea/liste.html.twig', ['ideas' => $ideas]);
    }

    /**
     * @Route(path="detail/{id}", name="detail", requirements={"id":"\d"}, methods={"GET"})
     * @param EntityManagerInterface $entityManager
     */
    public function detail(Request $request, EntityManagerInterface $entityManager){

        //Recuperation de l'entité dans la BDD
        $idea = $entityManager->getRepository('App:Idea')->find($request->get('id'));
        //Verification interne
        if(is_null($idea)){
            throw $this->createNotFoundException();
        }


        return $this->render('TP/idea/detail.html.twig', ['idea' => $idea]);
    }
}