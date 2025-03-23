<?php

namespace App\Controller\Admin;

use App\Entity\Actuality;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use FOS\CKEditorBundle\Form\Type\CKEditorType;


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
}