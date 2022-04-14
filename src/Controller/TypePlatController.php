<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use App\Entity\TypePlat;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use App\Form\TypePlatType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class TypePlatController extends AbstractController {

    /**
     * @Route("/TypePlat/new", name="new_TypePlat")
     */
    public function new(Request $request) {
        $unTypePlat = new TypePlat();
        $form = $this->createForm(TypePlatType::class, $unTypePlat);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $unTypePlat= $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($unTypePlat);
            $entityManager->flush();
            return $this->redirectToRoute('detail_TypePlat', array('id' => $unTypePlat->getId()));
        }
        return $this->render('TypePlat/new.html.twig', array(
                    'form' => $form->createView(),
        ));
    }
     /**
     * @Route("/TypePlat/detail/{id}", name="detail_TypePlat")
     */
    public function detail($id) {
        $entityManager = $this->getDoctrine()->getManager();
        $unTypePlat = $entityManager->getRepository("App\Entity\TypePlat")->find($id);
        $lesPlats = $unTypePlat->getLesPlats();

        return $this->render('TypePlat/detail.html.twig', array(
                    'unTypePlat' => $unTypePlat,
                    'lesPlats' => $lesPlats
        ));
    }
    /**
     * @Route("/TypePlat/liste", name="liste_TypePlat")
     */
    public function liste() {
        $entityManager = $this->getDoctrine()->getManager();
        $lesTypesPlats = $entityManager->getRepository("App:TypePlat")->findAll();

        return $this->render('TypePlat/liste.html.twig', [
                    'lesTypesPlats' => $lesTypesPlats,
        ]);
    }
    /**
     * @Route("/TypePlat/upd/{id}", name="upd_TypePlat")
     */
    public function upd($id, Request $request) {
        $entityManager = $this->getDoctrine()->getManager();
        $unTypePlat = $entityManager->getRepository("App:TypePlat")->find($id);

        $form = $this->createForm(TypePlatType::class, $unTypePlat);



        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // on peut se passer de 
            //$unEspace->setNomM($form->get("nomE")->getData());
            // car getData() a deja récupéré l'objet complet modifié
            $unTypePlat = $form->getData();
            $entityManager->persist($unTypePlat);
            $entityManager->flush();
        }
        return $this->render('TypePlat/upd.html.twig', [
                    'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/TypePlat/del/{id}", name="del_TypePlat")
     */
    public function delTypePlat($id) {
        $entityManager = $this->getDoctrine()->getManager();
        $unTypePlat = $entityManager->getRepository("App:TypePlat")->find($id);
        $entityManager->remove($unTypePlat);
        $entityManager->flush();

        return $this->redirectToRoute('liste_TypePlat');
    }
}