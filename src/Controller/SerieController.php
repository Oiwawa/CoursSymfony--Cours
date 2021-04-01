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
     * @Route("/serie/{numPage}", requirements={"numPage" :"\d+"}, name="serie_liste")
     */
    public function index($numPage): Response
    {
    $serieRepo = $this->getDoctrine()->getRepository(Serie::class);
    $nbPages = $serieRepo->nbPages(10);
    $series = $serieRepo->findWithSeasons(10, $numPage);
    return $this->render('serie/list.html.twig', [
        'series' =>$series,
        'numPage'=>$numPage,
        'nbPages' =>$nbPages,
    ]);

    }

    /**
     * @param Request $request
     * @param EntityManagerInterface $em
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

    /**
     * @Route(path="/serie/delete/{id}", requirements={"id" :"\d+"}, name="serie_delete")
     */
    public function delete($id, EntityManagerInterface $em){
        $repo = $em->getRepository(Serie::class);
        $serie = $repo->find($id);
        $em->remove($serie);
        $em->flush();

        $this->addFlash('success', 'The serie '.$serie->getSerieName().' has been deleted!');

        return $this->redirectToRoute('serie_liste', ['numPage'=>1]);
    }
}
