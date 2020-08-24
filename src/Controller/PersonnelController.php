<?php

namespace App\Controller;

use App\Entity\Personnel;
use App\Form\PersonnelType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class PersonnelController extends AbstractController
{
    /**
     * @Route("/personnel", name="personnel")
     */
    public function index(SessionInterface $session, Request $request)
    {
        $personnel=new  Personnel();
        $doc=$session->get('_doc');
        $dossiersession = $doc['_dossier_en_cour'];
        $entreprisesession = $doc['_entre_en_cour'];
        $formulaire=$this->createForm(PersonnelType::class,$personnel);
        $formulaire->handleRequest($request);
        if($formulaire->isSubmitted() && $formulaire->isValid()){
            $personnel=$formulaire->getData();
            $personnel->setEntreprise($entreprisesession);
            $personnel->setDossier($dossiersession);
            dd($personnel);
            $personnel->setMatricule(new \DateTime('now').substr($formulaire['nom']->getData(),0,2).substr($formulaire['prenom']->getData(),0,2));
            $entityManager=$this->getDoctrine()->getManager();
            $entityManager->persist($personnel);
            $entityManager->flush();
            return $this->render('entreprise/index.html.twig',[
                'formulaire'=>$formulaire->createView()
            ]);
        }
        return $this->render('personnel/index.html.twig', [
            'formulaire' => $formulaire->createView()
        ]);
    }
}
