<?php


namespace App\Controller\TP;



use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
     */
    public function detail(){

        return $this->render('TP/idea/detail.html.twig');
    }
}