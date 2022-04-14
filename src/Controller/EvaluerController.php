<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Evaluer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use App\Form\EvaluerType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class EvaluerController extends AbstractController {
    
    /**
     * @Route("/evaluer/new", name="new_evaluer")
     */
    public function new(Request $request) {
        $uneEvaluation = new Evaluer();
        $form = $this->createForm(EvaluerType::class, $uneEvaluation);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $uneEvaluation=$form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($uneEvaluation);
            $entityManager->flush();
            return $this->redirectToRoute('detail_evaluer', array('id' => $uneEvaluation->getId()));
        }
        return $this->render('evaluer/new.html.twig', array(
                    'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/evaluer/detail/{id}", name="detail_evaluer")
     */
    public function detail($id) {
        $entityManager = $this->getDoctrine()->getManager();
        $uneEvaluer = $entityManager->getRepository("App:Evaluer")->find($id);

        return $this->render('evaluer/detail.html.twig', array(
                    'uneEvaluer' => $uneEvaluer
        ));
    }

    /**
     * @Route("/evaluer/liste", name="liste_evaluer")
     */
    public function liste() {
        $entityManager = $this->getDoctrine()->getManager();
        $lesEvaluer = $entityManager->getRepository("App:Evaluer")->findAll();

        return $this->render('evaluer/liste.html.twig', [
                    'lesEvaluer' => $lesEvaluer,
        ]);
    }

    /**
     * @Route("/evaluer/upd/{id}", name="upd_evaluer")
     */
    public function upd($id, Request $request) {
        $entityManager = $this->getDoctrine()->getManager();
        $uneEvaluer = $entityManager->getRepository("App:Evaluer")->find($id);

        $form = $this->createForm(EvaluerType::class, $uneEvaluer);



        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $uneEvaluer = $form->getData();
            $entityManager->persist($uneEvaluer);
            $entityManager->flush();
        }
        return $this->render('evaluer/upd.html.twig', [
                    'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/evaluer/del/{id}", name="del_evaluer")
     */
    public function delEvaluer($id) {
        $entityManager = $this->getDoctrine()->getManager();
        $uneEvaluer = $entityManager->getRepository("App:Evaluer")->find($id);
        $entityManager->remove($uneEvaluer);
        $entityManager->flush();

        return $this->redirectToRoute('liste_evaluer');
    }
}
