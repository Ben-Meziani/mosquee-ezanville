<?php

namespace App\Controller\Admin;

use App\Entity\MosqueeImage;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class MosqueeImageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MosqueeImage::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new("name");
        // yield ImageField::new('file')
        //     ->setBasePath('/uploads/images')
        //     ->setUploadDir('public/uploads/images')
        //     ->setUploadedFileNamePattern('[randomhash].[extension]')
        //     ->setRequired(false);
        yield TextField::new('file')
            ->setFormType(VichImageType::class)
            ->setFormTypeOption('allow_delete', true)
            ->setFormTypeOption('download_uri', false);
    }
}
