<?php

namespace  App\Security;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Session\Session;

class FrontEndAuthenticator{
    public function isUserValid(UserRepository $userRepo){

        $session = new Session();

        $username = $session->get("username");
        $password = $session->get("password");

        $user = $userRepo->findOneBy(["username" => $username, "password" => $password]);
        if(!$user){
            return false;
        }
        return true;
    }
}