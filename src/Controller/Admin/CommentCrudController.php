<?php

namespace App\Controller\Admin;

use App\Entity\Comment;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CommentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Comment::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */

    // link post solution https://gitmemory.com/issue/EasyCorp/EasyAdminBundle/3477/653593474
    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addPanel('Conference'),
            AssociationField::new('conference')
                ->setRequired(true)
                ->setHelp('help text'),
            FormField::addPanel('Comment'),
            TextField::new('author')
                ->setHelp('Your name'),
            TextEditorField::new('text', 'Comment')
                ->setHelp('help text'),
            EmailField::new('email', 'Email Address')
                ->setHelp('Your valid email address'),
            DateTimeField::new('createdAt'),
            TextField::new('photoFilename')
        ];
    }
}
