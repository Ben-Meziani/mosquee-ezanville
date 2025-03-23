<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Utlisateur')
            ->setEntityLabelInPlural('Utlisateurs')
            ->setSearchFields(['email', 'username', 'lastname'])
            ->setDefaultSort(['id' => 'DESC']);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('email', 'Email'),
            TextField::new('username', 'Username')->setLabel('Prénom'),
            TextField::new('lastname', 'Last Name')->setLabel('Nom'),
            BooleanField::new('isVerified', 'Is Verified')->setLabel('Email confirmé'),
        ];
    }
}
