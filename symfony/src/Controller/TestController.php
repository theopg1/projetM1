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
            ['id' => '1', 'nom' => 'Black Clover', 'episodes' => '24', 'genre' => 'Action'],
            ['id' => '2','nom' => 'One Piece', 'episodes' => '850', 'genre' => 'Drama'],
            ['id' => '3','nom' => 'Bleach', 'episodes' => '366', 'genre' => 'Action'],
            ['id' => '4','nom' => 'Naruto', 'episodes' => '574', 'genre' => 'Comedy'],
            ['id' => '5','nom' => 'Eyeshield21', 'episodes' => '64', 'genre' => 'Comedy'],
        ];


       return $this->render('homepage.html.twig', [
           'title' => '> Nos Mangas et Animes :',
           'topMangas' => $animangas,
           'topAnimes' => $animangas,
       ]);
    }

    /**
     * @Route("/browse/{slug}", name="genreAnimanga")
     */
    public function browse(string $slug = null) : Response
    {
        $animangas = [
            ['id' => '1', 'nom' => 'Black Clover', 'episodes' => '24', 'genre' => 'Action'],
            ['id' => '2','nom' => 'One Piece', 'episodes' => '850', 'genre' => 'Drama'],
            ['id' => '3','nom' => 'Bleach', 'episodes' => '366', 'genre' => 'Action'],
            ['id' => '4','nom' => 'Naruto', 'episodes' => '574', 'genre' => 'Comedy'],
            ['id' => '5','nom' => 'Eyeshield21', 'episodes' => '64', 'genre' => 'Comedy'],
            ['id' => '6','nom' => 'Black Butler', 'episodes' => '12', 'genre' => 'Drama'],
        ];

        $genre = $slug ? str_replace('-', ' ', $slug) : null;

        return $this->render('browse.html.twig', [
            'genre' => $genre,
            'title' => 'Animanga',
            'animangas' => $animangas,
        ]);
    }

    /**
     * @Route("/animanga/{slug}", name="animanga")
     */
    public function animanga(string $slug = null) : Response
    {

        $id = $slug ? : null;

        return $this->render('animanga.html.twig', [
            'genre' => '$genre',
            'title' => 'Animanga',
            'animangas' => '$animangas',
        ]);
    }

}