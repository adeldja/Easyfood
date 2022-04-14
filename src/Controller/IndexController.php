<?php
// src/Controller/DefaultController.php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IndexController extends AbstractController
 {
     /**
      * @Route("/")
      */
     public function index()
     {
        
        return $this->render('default/index.html.twig', [
            'message' => 'EasyFood',
        ]); // $this->render() retourne un objet Response
     }
}