<?php

namespace App\Controller;

use App\Entity\VideoLesson;
use App\Repository\VideoLessonRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LessonController extends AbstractController
{
    #[Route('/online-lessons', name: 'app_lessons')]
    public function index(VideoLessonRepository $lessonRepo): Response
    {
        return $this->render('lesson/index.html.twig', [
            'controller_name' => 'LessonController',
            'lessons' => $lessonRepo->findAll()
        ]);
    }

    #[Route('/lesson/{slug}', name: 'app_lesson', methods: ['GET'])]
    public function show(VideoLesson $lesson): Response
    {
        return $this->render('lesson/lesson_show.html.twig',['lesson' => $lesson]);
    }
}
