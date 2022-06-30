<?php

namespace App\Controller;

use App\Repository\AnimangaRepository;
use App\Repository\GenresRepository;
use App\Repository\AvisRepository;
use App\Repository\UserRepository;
use App\Entity\Avis;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;

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
    public function browse(AnimangaRepository $repository, GenresRepository $genresRepository, string $slug = null) : Response
    {
        $animangas = $repository->findall();
        $genres = $genresRepository->findall();

        $genreSlug = $slug ? str_replace('-', ' ', $slug) : null;

        return $this->render('browse.html.twig', [
            'path' => 'genreAnimanga',
            'genreSlug' => $genreSlug,
            'genres' => $genres,
            'title' => 'Animangas',
            'animangas' => $animangas,
        ]);
    }

    /**
     * @Route("/browseManga/{slug}", name="genreManga")
     */
    public function browseManga(AnimangaRepository $repository, GenresRepository $genresRepository, string $slug = null) : Response
    {
        $animangas = $repository->findBy(['type' => 'Manga']);
        $genres = $genresRepository->findall();

        $genreSlug = $slug ? str_replace('-', ' ', $slug) : null;

        return $this->render('browse.html.twig', [
            'path' => 'genreManga',
            'genreSlug' => $genreSlug,
            'genres' => $genres,
            'title' => 'Mangas',
            'animangas' => $animangas,
        ]);
    }

    /**
     * @Route("/browseAnime/{slug}", name="genreAnime")
     */
    public function browseAnime(AnimangaRepository $repository, GenresRepository $genresRepository, string $slug = null) : Response
    {
        $animangas = $repository->findBy(['type' => 'Anime']);
        $genres = $genresRepository->findAllbyAsc();

        $genreSlug = $slug ? str_replace('-', ' ', $slug) : null;

        return $this->render('browse.html.twig', [
            'path' => 'genreAnime',
            'genreSlug' => $genreSlug,
            'genres' => $genres,
            'title' => 'Animes',
            'animangas' => $animangas,
        ]);
    }

    /**
     * @Route("/animanga/{slug}", name="animanga")
     */
    public function animanga(AnimangaRepository $repository, int $slug = null,Request $request, ManagerRegistry $doctrine, 
    UserRepository $users, AvisRepository $avisRepo ) : Response
    {
        $userId = 1;
        $id = $slug ? : null;
        
        $animanga = $repository->findOneBy(['id' => $id]);
        $avisList = $avisRepo->findBy(["animanga"=> $animanga]);

        $entityManager = $doctrine->getManager();
        $form = $this->createFormBuilder()->add('task', TextType::class)->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $user = $users->find($userId);

            $avis = new Avis();
            $avis->setComment($form["task"]->getData());
            $avis->setAnimanga($animanga);
            $avis->setUser($user);

            $entityManager->persist($avis);
            $entityManager->flush();

            return $this->redirect($request->getUri());
        }

        return $this->render('animanga.html.twig', [
            'title' => 'Animanga',
            'animanga' => $animanga,
            'avis' => $avisList,
            'form' => $form->createView(),
        ]);
    }

}