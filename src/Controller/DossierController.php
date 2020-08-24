<?php

namespace App\Controller;

use App\Entity\Dossier;
use App\Form\DossierType;
use App\Repository\DossierRepository;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use \Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DossierController extends AbstractController
{
    /**
     * @Route("/listedossier", name="dossier")
     */
    public function index(Request $request, DossierRepository $repo)
    {
        $dossier=$repo->findAll();
        return $this->render('dossier/index.html.twig', [
            'dossier' => $dossier
        ]);
    }
    /**
     * @Route("/listedossier/choix/", name="dossier_choix")
     */
    public function choix(Request $request)
    {
        $session= $request->getSession();
        $traitementCourant=$session->get('_doc',[]);
        if ($request->request->get('_dossier')!= null  ) {
            $traitementCourant['_dossier_en_cour']= $request->request->get('_dossier');
            $traitementCourant['_entre_en_cour']= 1;
        }
        $session->set('_doc',$traitementCourant);
        return $this->redirectToRoute('etat_vert');
    }

    /**
     * @Route("/creedossier", name="creedossier")
     */
    public function creedossier( Request $request)
    {
            $dossier=new Dossier();
            $form=$this->createForm(DossierType::class,$dossier);
            $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
                $dossier = $form->getData();
                $dossier->setDatedernierchargement(new \DateTime('now'));
                $entityManager = $this->getDoctrine()->getManager();
                $dossier->setPERSONNEL('');
                $entityManager->persist($dossier);
                $entityManager->flush();
                return $this->render('dossier/makedossier.html.twig',['formulaire'=>$form->createView() ]);
        }

        return $this->render('dossier/makedossier.html.twig',['formulaire'=>$form->createView() ]);
    }
}
