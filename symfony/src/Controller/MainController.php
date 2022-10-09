<?php

namespace App\Controller;

use App\Repository\AnimangaRepository;
use App\Repository\GenresRepository;
use App\Repository\AvisRepository;
use App\Repository\UserRepository;
use App\Entity\Avis;
use App\Security\FrontEndAuthenticator;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Common\Collections\Criteria;
use Doctrine\Common\Collections\Expr\Comparison;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;


class MainController extends AbstractController
{

    /**
     * @Route("/", name="homePage")
     */
    public function homepage(AnimangaRepository $repository, Request $request, UserRepository $users) : Response
    {
        $topMangas = $repository->findBy(['type' => 'Manga'],[],5);
        $topAnimes = $repository->findBy(['type' => 'Anime'],[],5);

        $frontEndIdenticator = new FrontEndAuthenticator();

        $userId = $frontEndIdenticator->getUserId($users, $request->getSession());

        $form = $this->createFormBuilder()->add('search', TextType::class)->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            return $this->redirectToRoute('searchAnimanga' , ['slug' => $form["search"]->getData()]);;
        }

       return $this->render('homepage.html.twig', [
           'title' => '> Nos Mangas et Animes :',
           'topMangas' => $topMangas,
           'topAnimes' => $topAnimes,
           'form' => $form->createView(),
           'id' => $userId,
       ]);
    }

    /**
     * @Route("/search/{slug}", name="searchAnimanga")
     */
    public function search(AnimangaRepository $repository, UserRepository $users, Request $request, string $slug = null) : Response
    {
        $searchSlug = $slug ? str_replace('_', ' ', $slug) : null;

        $frontEndIdenticator = new FrontEndAuthenticator();

        $userId = $frontEndIdenticator->getUserId($users, $request->getSession());

        $criteria = new Criteria();
        $expr = new Comparison('title', Comparison::CONTAINS, $searchSlug);
        $criteria->where($expr);
        $criteria->orderBy(['title' => Criteria::ASC]);

        $criteriaUser = new Criteria();
        $exprUser = new Comparison('username', Comparison::CONTAINS, $searchSlug);
        $criteriaUser->where($exprUser);
        $criteriaUser->orderBy(['username' => Criteria::ASC]);

        $resultAnimanga = $repository->matching($criteria);
        $resultProfil = $users->matching($criteriaUser);

        return $this->render('search.html.twig', [
            'searchSlug' => $searchSlug,
            'title' => 'Animangas',
            'animangas' => $resultAnimanga,
            'users' => $resultProfil,
            'id' => $userId,
        ]);
    }

    /**
     * @Route("/browse/{slug}", name="genreAnimanga")
     */
    public function browse(AnimangaRepository $repository, UserRepository $users, Request $request, GenresRepository $genresRepository, string $slug = null) : Response
    {
        $animangas = $repository->findBy([],['title' => 'ASC']);
        $genres = $genresRepository->findBy([],['label' => 'ASC']);

        $frontEndIdenticator = new FrontEndAuthenticator();

        $userId = $frontEndIdenticator->getUserId($users, $request->getSession());

        $genreSlug = $slug ? str_replace('-', ' ', $slug) : null;

        return $this->render('browse.html.twig', [
            'path' => 'genreAnimanga',
            'genreSlug' => $genreSlug,
            'genres' => $genres,
            'title' => 'Animangas',
            'animangas' => $animangas,
            'id' => $userId,
        ]);
    }

    /**
     * @Route("/browseManga/{slug}", name="genreManga")
     */
    public function browseManga(AnimangaRepository $repository, UserRepository $users, Request $request, GenresRepository $genresRepository, string $slug = null) : Response
    {
        $animangas = $repository->findBy(['type' => 'Manga'],['title' => 'ASC']);
        $genres = $genresRepository->findBy([],['label' => 'ASC']);

        $frontEndIdenticator = new FrontEndAuthenticator();

        $userId = $frontEndIdenticator->getUserId($users, $request->getSession());

        $genreSlug = $slug ? str_replace('-', ' ', $slug) : null;

        return $this->render('browse.html.twig', [
            'path' => 'genreManga',
            'genreSlug' => $genreSlug,
            'genres' => $genres,
            'title' => 'Mangas',
            'animangas' => $animangas,
            'id' => $userId,
        ]);
    }

    /**
     * @Route("/browseAnime/{slug}", name="genreAnime")
     */
    public function browseAnime(AnimangaRepository $repository, UserRepository $users, Request $request, GenresRepository $genresRepository, string $slug = null) : Response
    {
        $animangas = $repository->findBy(['type' => 'Anime'],['title' => 'ASC']);
        $genres = $genresRepository->findBy([],['label' => 'ASC']);

        $frontEndIdenticator = new FrontEndAuthenticator();

        $userId = $frontEndIdenticator->getUserId($users, $request->getSession());

        $genreSlug = $slug ? str_replace('-', ' ', $slug) : null;

        return $this->render('browse.html.twig', [
            'path' => 'genreAnime',
            'genreSlug' => $genreSlug,
            'genres' => $genres,
            'title' => 'Animes',
            'animangas' => $animangas,
            'id' => $userId,
        ]);
    }

    /**
     * @Route("/animanga/{slug}", name="animanga")
     */
    public function animanga(AnimangaRepository $repository, int $slug = null, Request $request, ManagerRegistry $doctrine,
    UserRepository $users, AvisRepository $avisRepo ) : Response
    {

        $frontEndIdenticator = new FrontEndAuthenticator();

        $userId = $frontEndIdenticator->getUserId($users, $request->getSession());
        
        $animangaId = $slug ? : null;
        $isUserValid = $userId !== false;
        
        $animanga = $repository->findOneBy(['id' => $animangaId]);
        $avisList = $avisRepo->findBy(["animanga"=> $animanga]);

        $entityManager = $doctrine->getManager();
        $form = $this->createFormBuilder()->add('comment', TextareaType::class)->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           

            if($userId !== false){

                $user = $users->find($userId);

                $avis = new Avis();
                $avis->setComment($form["comment"]->getData());
                $avis->setAnimanga($animanga);
                $avis->setUser($user);
    
                $entityManager->persist($avis);
                $entityManager->flush();
    
                return $this->redirect($request->getUri());

            }
            else{
                $isUserValid = true;
            }
        }

        $renderArr = [
            'animanga' => $animanga,
            'avis' => $avisList,
            "form" => $form->createView(),
            'id' => $userId,

        ];

        return $this->render($isUserValid? 'animanga.html.twig' : 'animangaNoComment.html.twig', $renderArr);
    }

    /**
     * @Route("/users/{id}", name="users")
     */
    public function userProfil( int $id = null,Request $request, ManagerRegistry $doctrine,
                                UserRepository $usersRepo, AvisRepository $avisRepo ) : Response
    {

        /*$frontEndIdenticator = new FrontEndAuthenticator();
        $userId = $frontEndIdenticator->getUserId($usersRepo, $request->getSession());
        $userIdSession = $usersRepo->findOneBy(["id"=> $userId]);

        $userIdProfil = $id ? : $usersRepo->find($userIdSession);*/

        $userId = $id;

        if( $id === null) {
            $user = $usersRepo->findAll();
        } else {
            $user = $usersRepo->find($id);
        }

        $avisList = $avisRepo->findBy(["userId"=> $userId]);

        return $this->render('user.html.twig', [
            'title' => '',
            'avis' => $avisList,
            'user' => $user,
            'id' => $id,
        ]);
    }

}