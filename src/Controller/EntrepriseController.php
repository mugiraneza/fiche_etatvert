<?php

namespace App\Controller;

use App\Entity\Entreprise;
use App\Form\EntrepriseType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class EntrepriseController extends AbstractController
{
    /**
     * @Route("/entreprise", name="entreprise")
     */
    public function index(Request $request)
    {
        $entreprise=new  Entreprise();
        $formulaire=$this->createForm(EntrepriseType::class,$entreprise);
        $formulaire->handleRequest($request);
        if($formulaire->isSubmitted() && $formulaire->isValid()){
            $brochureFile = $formulaire ['logo']->getData();
            $originalFilename = pathinfo($brochureFile->getClientOriginalName(), PATHINFO_FILENAME);
            $newFilename = 'fichier-'.uniqid().'.'.$brochureFile->guessExtension();
            try {
                $brochureFile->move(
                    $this->getParameter('logo_directory'),
                    $newFilename
                );
            } catch (FileException $e) {

            }
            $entreprise=$formulaire->getData();
            $entreprise->setCreationdate(new \DateTime('now'));
            $entreprise->setLogo($newFilename);
            $entityManager=$this->getDoctrine()->getManager();
            $entityManager->persist($entreprise);
            $entityManager->flush();

            unset($entityManager);
            unset($entreprise);
            return $this->render('entreprise/index.html.twig',[
                'formulaire'=>$formulaire->createView()
            ]);
        }
        return $this->render('entreprise/index.html.twig', [
            'formulaire' => $formulaire->createView()
        ]);
    }
}
