<?php

namespace App\Controller\Admin;

use App\Entity\Actuality;
use App\Entity\Historic;
use App\Entity\MosqueeImage;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(UserCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Mosquee');
    }

    public function configureAssets(): Assets
{
    return Assets::new()
        ->addCssFile('css/admin.css')
        ->addJsFile('js/admin.js');
}

    public function configureMenuItems(): iterable
    {
       yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-user', User::class);
       yield MenuItem::linkToCrud('Historique', 'fas fa-book', Historic::class);
       yield MenuItem::linkToCrud('Images', 'fas fa-book', MosqueeImage::class);
       yield MenuItem::linkToCrud('Actualités', 'fas fa-book', Actuality::class);
       
    
    }
}
