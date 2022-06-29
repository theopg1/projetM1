<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/backlogin", name="backlogin")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('@EasyAdmin/page/login.html.twig', [
            // parameters usually defined in Symfony login forms
            'error' => $error,
            'last_username' => $lastUsername,           
            'page_title' => 'Connexion au back-office Animanga',
            'csrf_token_intention' => 'authenticate',
            'target_path' => $this->generateUrl('backoffice'),
            'username_label' => 'Identifiant',
            'password_label' => 'Mot de passe',
            'sign_in_label' => 'Connexion',
            'remember_me_enabled' => true,
            'remember_me_parameter' => 'custom_remember_me_param',
            'remember_me_checked' => false,
            'remember_me_label' => 'Se souvenir de moi',
        ]);
    }

    /**
     * @Route("/backlogout", name="backlogout")
     */
    public function logout()
    {
        
    }
}
