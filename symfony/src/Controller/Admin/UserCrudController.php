<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('username'),
            EmailField::new('email'),
            TextField::new('password')->setFormType(PasswordType::class)->onlyWhenCreating(),
            TextField::new('profile_image'),
            TextField::new('back_image'),
            ChoiceField::new('roles')->allowMultipleChoices()->setChoices(['ROLE ADMIN' => 'ROLE_ADMIN', 'ROLE MODERATOR' => 'ROLE_MODERATOR', 'ROLE_USER' => 'ROLE_USER']),


        ];
    }

}
