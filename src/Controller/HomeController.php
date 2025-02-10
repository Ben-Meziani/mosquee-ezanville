<?php

namespace App\Controller;

use App\Entity\Historic;
use App\Entity\MosqueeImage;
use App\Repository\HistoricRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
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
    public function mosquee(EntityManagerInterface $em): Response
    {
        $arrayHistory = $em->getRepository(Historic::class)->findAllHistoric();
        $images = $em->getRepository(MosqueeImage::class)->findAll();
        $images = count($images) > 0 ? array_chunk($images, ceil(count($images) / 2)) : [];
        $firstPartImages = !empty($images[0]) ? $images[0] : [];
        $secondPartImages = !empty($images[1]) ? $images[1] : [];
        return $this->render('home/mosquee.html.twig', [
            'history' => $arrayHistory,
            'firstPartImages' => $firstPartImages,
            'secondPartImages' => $secondPartImages
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

    #[Route('/mentions-legales', name: 'mentions-legales')]
    public function mentions(): Response
    {
        return $this->render('home/mentions-legales.html.twig');
    }

}
