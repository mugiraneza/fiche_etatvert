<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\UtilisateurRegistrationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/security/inscription", name="inscription")
     */
    public function inscription(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $user=new Utilisateur();
        $formulaire=$this->createForm(UtilisateurRegistrationType::class,$user);
        $formulaire->handleRequest($request);
        if( $formulaire->isSubmitted() && $formulaire->isValid()){
            $user=$formulaire->getData();
            $objectManager=$this->getDoctrine()->getManager();
            $hash=$encoder->encodePassword($user,$user->getPassword());
            $user->setPassword($hash);
            $objectManager->persist($user);
            $objectManager->flush();
            return $this->redirectToRoute('login');
        }
        return $this->render('security/registration.html.twig', [
            'formulaire' => $formulaire->createView()
        ]);

    }
    /**
     * @Route("/", name="login", methods={"GET", "POST"})
     * @Route("/security/login", name="login_direct", methods={"GET", "POST"})
     */
    public function connexion(Request $request,AuthenticationUtils $authenticationUtils)
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        $session= $request->getSession();
        $traitementCourant=$session->get('_doc',[]);

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('security/index.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);

    }
    /**
     * @Route("/security/logout", name="logout_direct", methods={"GET", "POST"})
     */
    public function logout(AuthenticationUtils $authenticationUtils)
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('security/index.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);

    }
}
