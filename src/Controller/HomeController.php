<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/contact', name: 'contact')]
    public function contact(): Response
    {
        return $this->render('home/contact.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/prayer', name: 'prayer')]
    public function prayer(): Response
    {
        return $this->render('home/prayer.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/activities', name: 'activities')]
    public function activities(): Response
    {
        return $this->render('home/activities.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/mosquee', name: 'mosquee')]
    public function mosquee(): Response
    {
        return $this->render('home/mosquee.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/actualities', name: 'actualities')]
    public function actualities(): Response
    {
        return $this->render('home/actualities.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/donation', name: 'donation')]
    public function donation(): Response
    {
        return $this->render('home/donation.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/informations', name: 'informations')]
    public function informations(): Response
    {
        return $this->render('home/informations.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

}
