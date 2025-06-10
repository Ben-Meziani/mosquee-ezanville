<?php

namespace App\Controller\Admin;

use App\Entity\Actuality;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;



class ActualityCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Actuality::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Actualité')
            ->setEntityLabelInPlural('Actualités')
            ->setPageTitle('index', 'Liste des %entity_label_plural%')
            ->setPaginatorPageSize(20)
            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title')->setLabel('Titre'),
            TextareaField::new('text')->setLabel('Texte')
                ->setFormType(CKEditorType::class)
                ->setFormTypeOptions([
                    'config_name' => 'config_full',
                ])
                ->hideOnIndex(),
        ];
    }

    #[Route('/admin/upload-image', name: 'admin_upload_image', methods: ['POST'])]
    public function uploadImage(Request $request): JsonResponse
    {
        /** @var UploadedFile $file */
        $file = $request->files->get('upload');
        
        if (!$file) {
            return new JsonResponse(['error' => ['message' => 'No file uploaded']], 400);
        }

        // Créer le dossier s'il n'existe pas
        $uploadDir = 'uploads/images';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $fileName = uniqid() . '.' . $file->guessExtension();
        
        $file->move($uploadDir, $fileName);
        
        $url = '/' . $uploadDir . '/' . $fileName;
        
        return new JsonResponse([
            'uploaded' => true,
            'url' => $url
        ]);
    }
}