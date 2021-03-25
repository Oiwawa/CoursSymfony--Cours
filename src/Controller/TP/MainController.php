<?php


namespace App\Controller\TP;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class MainController
 * @package App\Controller\TP
 * @Route(path="TP/", name="TP_")
 */
class MainController extends AbstractController
{

    /**
     * @Route(path="index", name="index", methods={"GET"})
     */
    public function index() {
        return $this->render('TP/home/index.html.twig');
    }

    /**
     * @Route(path="contact", name="contact", methods={"GET"})
     */
    public function contact() {
        return $this->render('TP/home/contact.html.twig');
    }

    /**
     * @Route(path="about", name="aboutus", methods={"GET"})
     */
    public function aboutUs(){
        return $this->render('TP/home/aboutUs.html.twig');
    }
}