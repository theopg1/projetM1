<?php

namespace App\Controller\Admin;

use App\Entity\Animanga;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class AnimangaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Animanga::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    
}
