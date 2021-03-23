<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CoursController
 * @package App\Controller
 * @Route(path="test/")
 */
class CoursController extends AbstractController
{
    /**
     * @Route(path="contact", name="contact")
     */
    public function contact(Request $request)
    {


        dump($request->getClientIp());

        $array= ["test", "test", "test"];
        dump($array);

        dump($request->get('name', 'inconnu'));

        dump($request->get('parametre','valeur default'));
        exit();
    }

    /**
     * @Route(path="about", name="test", methods={"GET","POST"})
     */
    public function test(Request $request){

        return new Response("<p>A propos de ! </p>");
    }

    /**
     * @Route(path="mentions", name="mentions")
     */
    public function mentions(Request $request){

        return $this->redirectToRoute('about');
    }


}