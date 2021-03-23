<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CoursController
 * @package App\Controller
 */
class HomeController extends AbstractController
{

    /**
     * @Route(path="", name="index", methods={"GET"})
     */
    public function index(){


        return $this->render('index.html.twig');
    }

    /**
     * @Route(path="home", name="home", methods={"GET"})
     */
    public function home(){


        return $this->redirectToRoute('index');
    }


}