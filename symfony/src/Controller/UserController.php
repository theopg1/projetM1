<?php

namespace App\Controller;


use App\Repository\AvisRepository;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class UserController extends AbstractController
{

    /**
     * @Route("/users/{id}", name="users")
     */
    public function animanga( int $id = null,Request $request, ManagerRegistry $doctrine, 
    UserRepository $usersRepo, AvisRepository $avisRepo ) : Response
    {
        $userId = $id;
        
        $user = $usersRepo->find($id);

        $avisList = $avisRepo->findBy(["userId"=> $userId]);      

        return $this->render('user.html.twig', [
            'title' => '',
            'avis' => $avisList,
            'user' => $user
        ]);
    }

}