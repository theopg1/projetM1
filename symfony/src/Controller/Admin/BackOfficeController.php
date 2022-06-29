<?php

namespace App\Controller\Admin;
use App\Entity\Animanga;

use App\Entity\Manga;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BackOfficeController extends AbstractDashboardController
{
    /**
     * @Route("/backoffice", name="backoffice")
     */
    public function index(): Response
    {
        return $this->render('/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Symfony');
    }

    public function configureMenuItems(): iterable
    {        
        
        yield MenuItem::section('Accueil');
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::section('Administration Utilisateurs');
        yield MenuItem::linkToCrud('Utilisateurs', 'fa fa-user', User::class);

        yield MenuItem::section('Administration Données');

        yield MenuItem::section('Déconnexion');
        yield MenuItem::linkToLogout('Se déconnecter', 'fa fa-sign-out');
        yield MenuItem::linkToCrud('Animanga', 'fas fa-list', Animanga::class);
    }
}
