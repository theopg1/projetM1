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
        $animangas = [
            ['id' => '1', 'nom' => 'Black Clover', 'episodes' => '24', 'genre' => 'Action'],
            ['id' => '2','nom' => 'One Piece', 'episodes' => '850', 'genre' => 'Drama'],
            ['id' => '3','nom' => 'Bleach', 'episodes' => '366', 'genre' => 'Action'],
            ['id' => '4','nom' => 'Naruto', 'episodes' => '574', 'genre' => 'Comedie'],
            ['id' => '5','nom' => 'Eyeshield21', 'episodes' => '64', 'genre' => 'Drama'],
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