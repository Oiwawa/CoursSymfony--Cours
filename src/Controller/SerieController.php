<?php

namespace App\Controller;

use App\Entity\Serie;
use App\Form\SerieType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SerieController extends AbstractController
{
    /**
     * @Route("/serie", name="serie_liste")
     */
    public function index(): Response
    {
    $serieRepo = $this->getDoctrine()->getRepository(Serie::class);
    $series = $serieRepo->findAll();
    return $this->render('list.html.twig', ['series' =>$series]);

    }

    /**
     * @return Response
     * @Route(path="/serie/add/", name="serie_add")
     */
    public function add(Request $request, EntityManagerInterface $em): Response
    {
        $serie = new Serie();
        $form = $this->createForm(SerieType::class, $serie);
        $serie->setDateCreated(new \DateTime());
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($serie);
            $em->flush();
            $this->addFlash('success','Serie added!');
            return $this->redirectToRoute('serie_liste');
        }
        return $this->render('serie/add.html.twig', ['serieFrom' => $form->createView()]);
    }
}
