<?php

namespace App\Controller;

use App\Repository\AnimangaRepository;
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
    public function browse(AnimangaRepository $repository, string $slug = null) : Response
    {
        $animangas = $repository->findall();

        $genre = $slug ? str_replace('-', ' ', $slug) : null;

        return $this->render('browse.html.twig', [
            'genre' => $genre,
            'title' => 'Animangas',
            'animangas' => $animangas,
        ]);
    }

    /**
     * @Route("/browseManga/{slug}", name="genreManga")
     */
    public function browseManga(AnimangaRepository $repository, string $slug = null) : Response
    {
        $animangas = $repository->findOneBy(['type' => 'Manga']);

        $genre = $slug ? str_replace('-', ' ', $slug) : null;

        return $this->render('browse.html.twig', [
            'genre' => $genre,
            'title' => 'Mangas',
            'animangas' => $animangas,
        ]);
    }

    /**
     * @Route("/browseAnime/{slug}", name="genreAnime")
     */
    public function browseAnime(AnimangaRepository $repository, string $slug = null) : Response
    {
        $animangas = $repository->findOneBy(['type' => 'Anime']);

        $genre = $slug ? str_replace('-', ' ', $slug) : null;

        return $this->render('browse.html.twig', [
            'genre' => $genre,
            'title' => 'Animes',
            'animangas' => $animangas,
        ]);
    }

    /**
     * @Route("/animanga/{slug}", name="animanga")
     */
    public function animanga(AnimangaRepository $repository, int $slug = null) : Response
    {

        $id = $slug ? : null;

        $animanga = $repository->findOneBy(['id' => $id]);

        return $this->render('animanga.html.twig', [
            'title' => 'Animanga',
            'animanga' => $animanga,
        ]);
    }

}