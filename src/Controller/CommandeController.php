<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Commande;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use App\Form\CommandeType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;



class CommandeController extends AbstractController {

    /**
     * @Route("/Commande/new", name="new_commande")
     */
    public function new(Request $request) {

        $uneCommande = new Commande();
         $form = $this->createForm(CommandeType::class, $uneCommande);

            $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $uneCommande = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($uneCommande);
            $entityManager->flush();
            return $this->redirectToRoute('liste_commande', array('id' => $uneCommande->getId()));
        }
        return $this->render('Commande/new.html.twig', [
                    'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/Commande/detail/{id}", name="detail_commande")
     */
    public function detail($id) {
        $entityManager = $this->getDoctrine()->getManager();
        $uneCommande = $entityManager->getRepository("App:Commande")->find($id);

        return $this->render('Commande/detail.html.twig', [
                    'uneCommande' => $uneCommande,
        ]);
    }
    
    /**
     * @Route("/Commande/liste", name="liste_commande")
     */
    public function liste() {
        $entityManager = $this->getDoctrine()->getManager();
        $lesCommandes = $entityManager->getRepository("App:Commande")->findAll();

        return $this->render('Commande/liste.html.twig', [
                    'lesCommandes' => $lesCommandes,
        ]);
    }
    /**
     * @Route("/Commande/upd/{id}", name="upd_commande")
     */
    public function upd($id, Request $request) {
        $entityManager = $this->getDoctrine()->getManager();
        $uneCommande = $entityManager->getRepository("App:Commande")->find($id);

        $form = $this->createForm(CommandeType::class, $uneCommande);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $uneCommande = $form->getData();
            $entityManager->persist($uneCommande);
            $entityManager->flush();
            
            return $this->redirectToRoute('liste_commande');
        }
        return $this->render('Commande/upd.html.twig', [
                    'form' => $form->createView(),
        ]);
        
    }

    /**
     * @Route("/Commande/del/{id}", name="del_commande")
     */
    public function delCommande($id) {
        $entityManager = $this->getDoctrine()->getManager();
        $uneCommande = $entityManager->getRepository("App:Commande")->find($id);
        $entityManager->remove($uneCommande);
        $entityManager->flush();

        return $this->redirectToRoute('liste_commande');
    }
}
