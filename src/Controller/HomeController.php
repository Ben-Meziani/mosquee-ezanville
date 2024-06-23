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
        $arrayHistory = [
            "1987" => "Création de l'Association socio-culturelle de la communauté islamique des Yvelines, qui permet aux musulmans de se retrouver pour pratiquer leur culte dans un mise à disposition par un fidèle au 11 rue Philippe de Dangeau à Ezanville",
            "1997" => "Modification de l'appellation de l'association pour devenir l'Association des Musulmans de Ezanville.fr (AMV).",
            "1999" => "Achat d'un terrain de 1 000 m² au 11 rue Philippe de Dangeau à Ezanville pour la construction d'une mosquée.",
            "2011" => "Adoption des statuts d'association cultuelle pour l'AMV, en vue d'une transformation de l'association suivi du projet de rénovation et de restructuration des lieux.",
            "2013" => "Début des travaux de rénovation et de restructuration de la mosquée.",
            "2014" => "Inauguration de la mosquée le 14 juin 2014.",
            "2015" => "Création de l'Association des Musulmans de Ezanville (AMV) pour la gestion de la mosquée de Ezanville.",
        ];
        return $this->render('home/mosquee.html.twig', [
            'history' => $arrayHistory,
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
    #[Route('/don-campaign', name: 'don-campaign')]
    public function don(): Response
    {
        return $this->render('home/don-campaign.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

}
