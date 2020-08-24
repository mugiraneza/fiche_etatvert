<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LivreDePaieController extends AbstractController
{
    /**
     * @Route("/livre/de/paie", name="livre_de_paie")
     */
    public function index()
    {
        return $this->render('livre_de_paie/index.html.twig', [
            'controller_name' => 'LivreDePaieController',
        ]);
    }
}
