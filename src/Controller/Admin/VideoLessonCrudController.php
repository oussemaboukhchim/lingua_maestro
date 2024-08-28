<?php

namespace App\Controller\Admin;

use App\Enum\Constants;
use App\Entity\VideoLesson;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class VideoLessonCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return VideoLesson::class;
    }

    public function configureFields(string $pageName): iterable
    {
        
        return [
            TextField::new('title'),
            SlugField::new('slug')->setTargetFieldName('title'),
            ChoiceField::new('category')->renderExpanded()->setChoices(array_flip(Constants::LESSON_CATEGORIES)),
            TextEditorField::new('content'),
            UrlField::new('videoUrl')
            ->setHelp('Enter the full URL, including http:// or https://'),
            ImageField::new('img')->setUploadDir('public/uploads')
                            ->setRequired(false)
                            ->setBasePath('/uploads')
                            ->setUploadedFileNamePattern('[year]-[month]-[day]-[contenthash].[extension]'),
        ];
    }
}
