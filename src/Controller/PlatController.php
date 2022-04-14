<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Plat;
use App\Repository\PlatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use App\Form\PlatType;
use App\Form\PlatRechercheType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class PlatController extends AbstractController {

    /**
     * @Route("/Plat/new", name="new_Plat")
     */
    public function new(Request $request) {
        $unPlat=new Plat();
        $form = $this->createForm(PlatType::class, $unPlat);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $unPlat=$form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($unPlat);
            $entityManager->flush();
            return $this->redirectToRoute('detail_Plat', array('id' => $unPlat->getId()));
        }
        return $this->render('Plat/new.html.twig', array(
                    'form' => $form->createView(),
        ));
    }
/**
     * @Route("Plat/recherche", name="recherche_Plat")
     */
    public function search(Request $request){
        $lesPlats=null;
        $form = $this->createFormBuilder()
                ->add('nomP',
                        TextType::class,
                        ['required' => true]
                )
                ->getForm();
              
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $nomP = $form->get("nomP")->getData();
            $em = $this->container->get('doctrine')->getManager();
            $lesPlats = $em->getRepository("App:Plat")->searchPlat($nomP);
        }
            return $this->render('Plat/recherche.html.twig', array(
                'lesPlats'=>$lesPlats,
                'form'=>$form->CreateView()
                
            ));
        }
    
    /**
     * @Route("/Plat/detail/{id}", name="detail_Plat")
     */
    public function detail($id) {
        $entityManager = $this->getDoctrine()->getManager();
        $unPlat = $entityManager->getRepository("App:Plat")->find($id);
        $lesCommanders = $unPlat->getLesCommanders();

        return $this->render('Plat/detail.html.twig', array(
                    'unPlat' => $unPlat,
                    'lesCommanders' => $lesCommanders
        ));
    }
     
    /**
     * @Route("/Plat/liste", name="liste_Plat")
     */
    public function liste() {
        $entityManager = $this->getDoctrine()->getManager();
        $lesPlats = $entityManager->getRepository("App:Plat")->findAll();

        return $this->render('Plat/liste.html.twig', [
                    'lesPlats' => $lesPlats,
        ]);
    }
    /**
     * @Route("/Plat/upd/{id}", name="upd_Plat")
     */
    public function upd($id, Request $request) {
        $entityManager = $this->getDoctrine()->getManager();
        $unPlat = $entityManager->getRepository("App:Plat")->find($id);

        $form = $this->createForm(PlatType::class, $unPlat);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $unPlat = $form->getData();
            $entityManager->persist($unPlat);
            $entityManager->flush();
        }
        return $this->render('Plat/upd.html.twig', [
                    'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/Plat/del/{id}", name="del_Plat")
     */
    public function delTypePlat($id) {
        $entityManager = $this->getDoctrine()->getManager();
        $unPlat = $entityManager->getRepository("App:Plat")->find($id);
        $entityManager->remove($unPlat);
        $entityManager->flush();

        return $this->redirectToRoute('liste_Plat');
    }

}
