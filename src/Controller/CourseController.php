<?php

namespace App\Controller;

use App\Entity\Course;
use App\Repository\CourseRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CourseController extends AbstractController
{
    #[Route('/courses', name: 'app_courses')]
    public function index(CourseRepository $courseRepo): Response
    {
        $courses = $courseRepo->findAll();
        return $this->render('course/index.html.twig', [
            'controller_name' => 'CourseController',
            'courses' => $courses
        ]);
    }

    #[Route('/course/{slug}', name: 'app_course', methods: ['GET'])]
    public function show(Course $course): Response
    {
        return $this->render('course/course_show.html.twig',['course' => $course]);
    }
}
