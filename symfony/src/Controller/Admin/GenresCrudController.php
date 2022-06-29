<?php

namespace App\Controller\Admin;

use App\Entity\Genres;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class GenresCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Genres::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('label'),
        ];
    }

}
