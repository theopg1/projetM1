<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class TestController extends AbstractController
{

    /**
     * @Route("/", name="homePage")
     */
    public function homepage() : Response
    {
        $animangas = [
            ['nom' => 'Black Clover', 'episodes' => '24'],
            ['nom' => 'One Piece', 'episodes' => '850'],
            ['nom' => 'Bleach', 'episodes' => '366'],
            ['nom' => 'Naruto', 'episodes' => '574'],
            ['nom' => 'Eyeshield21', 'episodes' => '64'],
        ];


       return $this->render('homepage.html.twig', [
           'title' => 'Animanga',
           'animangas' => $animangas,
       ]);
    }

    /**
     * @Route("/browse/{slug}", name="genreAnimanga")
     */
    public function browse(string $slug = null) : Response
    {

        $genre = $slug ? str_replace('-', ' ', $slug) : null;

        return $this->render('browse.html.twig', [
            'genre' => $genre,
        ]);
    }

}