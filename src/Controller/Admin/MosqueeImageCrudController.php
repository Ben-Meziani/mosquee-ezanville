<?php

namespace App\Controller\Admin;

use App\Entity\MosqueeImage;
use App\Form\MosqueeImageType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
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
        yield CollectionField::new('file')
            ->setEntryType(VichImageType::class)
            ->setFormTypeOption('by_reference', false);
    }
}
