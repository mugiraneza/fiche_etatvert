<?php

namespace App\Controller;

use App\Entity\Etat;
use App\Entity\Personnel;
use App\Repository\DossierRepository;
use App\Repository\EtatRepository;
use App\Repository\PersonnelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;


class EtatVertController extends AbstractController
{
    /**
     * @Route("/etat/affiche", name="etat_vert")
     */
    public function index(SessionInterface $session, DossierRepository $repo,PersonnelRepository $etatpersonne)
    {
        $dossier=$repo->findAll();
        $doc=$session->get('_doc');
        if (!empty($doc['_dossier_en_cour'])){
            $traitement = $doc['_dossier_en_cour'];
            $result =$etatpersonne->showStateGreen($traitement);
            //dd($result);
            return $this->render('etat_vert/index.html.twig', ['etat_verts'=>$result, 'traitement'=>empty($dossier['_dossier_en_cour']), 'dossier' => $dossier]);
        }
        return $this->render('etat_vert/index.html.twig', ['etat_verts'=>null, 'traitement'=>empty($dossier['_dossier_en_cour']),'dossier' => $dossier]);
    }
}
