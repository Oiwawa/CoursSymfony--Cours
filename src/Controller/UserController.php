<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class UserController
 * @package App\Controller
 * @Route(path="user/", name="user_")
 */
class UserController extends AbstractController
{

    /**
     * @Route(path="register", name="create", methods={"GET","POST"})
     */
    public function create() {

        return $this->render('create.html.twig');
    }
    /**
     * @Route(path="login", name="login", methods={"GET","POST"})
     */
    public function login() {

        return new Response("<p>Page de connexion </p>");
    }
    /**
     * @Route(path="edit", name="edit", methods={"GET","POST"})
     */
    public function edit() {

        return new Response("<p>Page de modification </p>");
    }

}