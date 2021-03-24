<?php


namespace App\Controller\TP1;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class MainController
 * @package App\Controller\TP1
 * @Route(path="TP1_", name="TP1_")
 */
class MainController extends AbstractController
{

    /**
     * @Route(path="index", name="index", methods={"GET"})
     */
    public function index() {
        return $this->render('TP1/index.html.twig');
    }

    /**
     * @Route(path="contact", name="contact", methods={"GET"})
     */
    public function contact() {
        return $this->render('TP1/contact.html.twig');
    }
}