<?php

namespace App\Controller\Admin;

use App\Entity\Animanga;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;

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
            TextField::new('originalTitle'),
            ChoiceField::new('type')->setChoices(['Anime' => 'Anime', 'Manga' => 'Manga']),
            TextEditorField::new('synopsis'),
            IntegerField::new('note'),
            IntegerField::new('releaseDate'),
            IntegerField::new('tomes'),
            IntegerField::new('episodes'),
            TextField::new('status'),
            TextField::new('image'),
            ChoiceField::new('status')->setChoices(['Finished' => 'Finished', 'Airing' => 'Airing', 'Not Yet Aired' => 'Not Yet Aired']),
            AssociationField::new('feedbacks')->hideOnForm(),

        ];
    }
    
}
