<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EtatIndividuelController extends AbstractController
{
    /**
     * @Route("/etat/individuel", name="etat_individuel")
     */
    public function index()
    {
        return $this->render('etat_individuel/index.html.twig', [
            'controller_name' => 'EtatIndividuelController',
        ]);
    }
}
