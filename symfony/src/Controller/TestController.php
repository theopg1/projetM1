<?php

namespace App\Controller;

use Animanga;
use App\Repository\AnimangaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
class TestController extends AbstractController
{

    /**
     * @Route("/", name="homePage")
     */
    public function homepage(AnimangaRepository $repo) : Response
    {

        $animangas = $repo->findAll();

       return $this->render('homepage.html.twig', [
           'title' => 'Animanga',
           'animangas' => $animangas,
       ]);
    }

    /**
     * @Route("/browse/{slug}", name="genreAnimanga")
     */
    public function browse(string $slug = null,AnimangaRepository $repo) : Response
    {
        $genre = $slug ? str_replace('-', ' ', $slug) : null;

        return $this->render('browse.html.twig', [
            'genre' => $genre,
        ]);
    }

}