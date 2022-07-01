<?php

namespace  App\Security;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Session\Session;

class FrontEndAuthenticator{
    public function getUserId(UserRepository $userRepo, Session $session){
        $user = $this->getUser($userRepo,$session);
        if($user){
            return ["id"];
        }
        return false;
    }

    public function getUser(UserRepository $userRepo, Session $session){

        $username = $session->get("username");
        $password = $session->get("password");

        $user = $userRepo->findOneBy(["username" => $username, "password" => $password]);
        if(!$user){
            return false;
        }
        return $user;
    }
}