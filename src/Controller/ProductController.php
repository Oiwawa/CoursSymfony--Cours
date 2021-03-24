<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ProductController
 * @package App\Controller
 * @Route(path="product/", name="product_")
 */
class ProductController extends AbstractController
{

    /**
     * @Route(path="get/{id}", requirements={"id": "\d+"}, name="get", methods={"GET"})
     */
    public function obtain(Request $request)
    {
        $pathProduct = $request->get('id');
        dump($pathProduct);

        $product_id = $request->get('product_id');
        dump($product_id);
        exit();
    }

    /**
     * @param Request $request
     * @Route(path="verif/{id}-{departement}", requirements={"id":"\d+", "departement":"\d+"}, defaults={"departement":"44"}, name="verif", methods={"GET"})
     * @return Response
     */
    public function verif(Request $request): Response
    {
        $infoUrlId = $request->get('id');
        $infoUrlDep = $request->get('departement');
        $infoUrlBoolean = $request->get('save', false);
        if(!filter_var($infoUrlBoolean, FILTER_VALIDATE_BOOLEAN)){
            $infoUrlBoolean = false;
        }

        if(!$infoUrlBoolean){
            throw $this->createAccessDeniedException("Accès refusé");
           // throw $this->createNotFoundException("Message d'erreur");
        }
        $infos = ['Identifant' =>$infoUrlId,'Departement'=> $infoUrlDep,'Save'=> $infoUrlBoolean];
        return $this->render('produit.html.twig', ['infos' => $infos]);
    }

}