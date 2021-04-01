<?php


namespace App\Controller\TP;



use App\Entity\Idea;
use App\Form\IdeaType;
use Doctrine\ORM\EntityManagerInterface;
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

        $ideaRepo = $this->getDoctrine()->getRepository(Idea::class);

        $category = $ideaRepo->findWithCategory();
        return $this->render('TP/idea/liste.html.twig', [
            'ideas' => $ideas,
            'category'=>$category
        ]);
    }

    /**
     * @Route(path="detail/{id}", name="detail", requirements={"id":"\d"}, methods={"GET"})
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function detail(Request $request, EntityManagerInterface $entityManager): Response
    {

        //Recuperation de l'entité dans la BDD
        $idea = $entityManager->getRepository('App:Idea')->find($request->get('id'));
        //Verification interne
        if(is_null($idea)){
            throw $this->createNotFoundException();
        }


        return $this->render('TP/idea/detail.html.twig', ['idea' => $idea]);
    }

    /**
     * @param Request $request
     * @param EntityManagerInterface $em
     * @Route(path="new", name="add")
     * @return Response
     */
    public function add(Request $request, EntityManagerInterface $em): Response{
        $idea = new Idea();
        $form = $this->createForm(IdeaType::class, $idea);
        $idea->setIsPublished(1);
        $idea->setDateCreated(new \DateTime());
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($idea);
            $em->flush();
            $this->addFlash('success','Your idea has been added!');
            return $this->redirectToRoute('TP_detail',['id'=>$idea->getId()]);
        }
        return $this->render('TP/idea/add.html.twig', ['idea' => $idea, 'ideaForm'=>$form->createView()]);
    }
}