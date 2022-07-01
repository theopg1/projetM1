<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Security\FrontEndAuthenticator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;


class LoginController extends AbstractController
{

    /**
     * @Route("/login", name="loginPage")
     */
    public function login(Request $request, UserRepository $userRepo) : Response
    {

        $form = $this->createLoginForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $session = $request->getSession();

            $session->set("username", $form["username"]->getData());
            $session->set("password", $form["password"]->getData());

            $authenticator = new FrontEndAuthenticator();
            $user = $authenticator->getUser($userRepo, $session);
            if(!!$user){
                return $this->redirectToRoute('homePage');
            }
            
        }

       return $this->render('login.html.twig', [
           'title' => 'Login',
           'form' => $form->createView(),
       ]);
    }

    public function createLoginForm(){
        return $this->createFormBuilder()->add('login', TextType::class)
        ->add('password', PasswordType::class)->getForm();
    }

}