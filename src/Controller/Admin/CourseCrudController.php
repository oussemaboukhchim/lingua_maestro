<?php

namespace App\Controller\Admin;

use App\Entity\Course;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CourseCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Course::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            SlugField::new('slug')->setTargetFieldName('title'),
            TextEditorField::new('description')->setRequired(false),
            ImageField::new('detailImg')->setUploadDir('public/uploads')
                            ->setRequired(false)
                            ->setBasePath('/uploads')
                            ->setUploadedFileNamePattern('[year]-[month]-[day]-[contenthash].[extension]'),
            ImageField::new('listImg')->setUploadDir('public/uploads')
                            ->setRequired(false)
                            ->setBasePath('/uploads')
                            ->setUploadedFileNamePattern('[year]-[month]-[day]-[contenthash].[extension]'),
            TextField::new('altImg')->setRequired(false),
            TextEditorField::new('program')->setRequired(false),
            TextField::new('category')->setRequired(false),
            TextField::new('level')->setRequired(false),
            TextField::new('duration')->setRequired(false),
            TextField::new('language')->setRequired(false),
        ];
    }
    
}
