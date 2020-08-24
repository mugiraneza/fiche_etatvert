<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RegularisationController extends AbstractController
{
    /**
     * @Route("/regularisation", name="regularisation")
     */
    public function index()
    {
        return $this->render('regularisation/index.html.twig', [
            'controller_name' => 'RegularisationController',
        ]);
    }
}
