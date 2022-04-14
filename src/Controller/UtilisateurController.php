<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Utilisateur;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

use App\Entity\TypeUtilisateur;
use App\Form\UtilisateurType;



class UtilisateurController extends AbstractController {
    /**
     * @Route("/utilisateur/inscription", name="inscription_utilisateur")
     */
    public function Inscription(Request $request ) {
     
            $unUtilisateur = new Utilisateur;
            $form = $this->createForm(UtilisateurType::class, $unUtilisateur);
       
           $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
           
            $pass_hache = password_hash($form->get('MdpU')->getData(), PASSWORD_DEFAULT);
           
            $unUtilisateur = $form->getData();
            $unUtilisateur->setMdpU($pass_hache);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($unUtilisateur);
            $entityManager->flush();
            return $this->redirectToRoute('detail_utilisateur', array('id' => $unUtilisateur->getId()));
                       
        }
        return $this->render('utilisateur/inscription.html.twig', [
                    'form' => $form->createView(),
        ]);
       
    }
    /**
     * @Route("/utilisateur/connexion", name="connexion_utilisateur")
     */
    public function Connexion( Request $request){
       
        $form = $this->createFormBuilder()
                ->add('nomM',
                        TextType::class,
                        ['required' => true]
                )
                ->add('mdpU',
                        TextType::class,
                        ['required' => true]
                )
     
                ->getForm();

        $form->handleRequest($request);
        $unUtilisateurTest = new Utilisateur();
       
        if ($form->isSubmitted() && $form->isValid()) {
           
            $unUtilisateurTest->setNom($form->get('nomM')->getData());
            $unUtilisateurTest->setMdpU($form->get('mdpU')->getData());
           
        }
        $Bvalider = false;
        $entityManager = $this->getDoctrine()->getManager();
        $nbUtilisatreur = $entityManager->getRepository("App\Entity\Utilisateur")->findAll();
       
        $i = 0;
        while($Bvalider != true && $i<count($nbUtilisatreur) ){
           
           
           
            if ( $unUtilisateurTest->getNom() == $nbUtilisatreur[$i]->getNom() && password_verify($unUtilisateurTest->getMdpU() ,$nbUtilisatreur[$i]->getMdpU() )){
                $Bvalider = true;
               
               
            }
            $i++;
           
        }
        if ($Bvalider == true){
            return $this->redirectToRoute('detail_utilisateur', array('id' => $nbUtilisatreur[$i-1]->getId()));
        }
             
       
        return $this->render('/utilisateur/connexion.html.twig', [
                    'form' => $form->createView(),
                   
                   
        ]);
       
       
       
    }
    /**
     * @Route("/utilisateur/deconexion", name="deconnexion_utilisateur")
     */
    public function Deconnexion( Request $request){
       
       
       
        if (!isset($_SESSION)) {
        session_start();
    }
   
    $MR = $_SESSION["nomM"];
   
    unset($_SESSION["nomM"]);
    unset($_SESSION["mdpU"]);
    unset($_SESSION["id"]);
   

        return $this->render('/utilisateur/deconnexion.html.twig', [
                    'Mr'=>$MR,
           
        ]);
  }
  /**
     * @Route("/utilisateur/detail/{id}", name="detail_utilisateur")
     */
    public function detail($id) {
        $entityManager = $this->getDoctrine()->getManager();
        $unUtilisateur = $entityManager->getRepository("App:Utilisateur")->find($id);
        $lesEvaluer = $unUtilisateur->getLesEvaluer();
        $lesRestos = $unUtilisateur->getLesRestos();
        $lesCommandes = $unUtilisateur->getLesCommandes();

        return $this->render('utilisateur/detail.html.twig', array(
                    'unUtilisateur' => $unUtilisateur,
                    'lesEvaluer'=> $lesEvaluer,
                    'lesRestos'=>$lesRestos,
                    '$lesCommandes'=>$lesCommandes
        ));
    }

    /**
     * @Route("/utilisateur/liste", name="liste_utilisateur")
     */
    public function liste() {
        $entityManager = $this->getDoctrine()->getManager();
        $lesUtilisateurs = $entityManager->getRepository("App:Utilisateur")->findAll();

        return $this->render('utilisateur/liste.html.twig', [
                    'lesUtilisateurs' => $lesUtilisateurs,
        ]);
    }

    /**
     * @Route("/utilisateur/upd/{id}", name="upd_utilisateur")
     */
    public function upd($id, Request $request) {
        $entityManager = $this->getDoctrine()->getManager();
        $unUtilisateur = $entityManager->getRepository("App:Utilisateur")->find($id);

        $form = $this->createForm(UtilisateurType::class, $unUtilisateur);



        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $unUtilisateur = $form->getData();
            $entityManager->persist($unUtilisateur);
            $entityManager->flush();
        }
        return $this->render('utilisateur/upd.html.twig', [
                    'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/utilisateur/del/{id}", name="del_utilisateur")
     */
    public function delUtilisateur($id) {
        $entityManager = $this->getDoctrine()->getManager();
        $unUtilisateur = $entityManager->getRepository("App:Utilisateur")->find($id);
        $entityManager->remove($unUtilisateur);
        $entityManager->flush();

        return $this->redirectToRoute('liste_utilisateur');
    }
}