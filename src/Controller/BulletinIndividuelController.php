<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BulletinIndividuelController extends AbstractController
{
    /**
     * @Route("/bulletin/individuel", name="bulletin_individuel")
     */
    public function index()
    {
        return $this->render('bulletin_individuel/index.html.twig', [
            'controller_name' => 'BulletinIndividuelController',
        ]);
    }
}
