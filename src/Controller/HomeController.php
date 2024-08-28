<?php

namespace App\Controller;

use App\Entity\ContactUs;
use App\Form\ContactUsType;
use Symfony\Component\Mime\Email;
use App\Repository\CourseRepository;
use App\Repository\VideoLessonRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Notifier\Exception\TransportException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(Request $request, MailerInterface $mailer , CourseRepository $courseRepo, VideoLessonRepository $lessonRepo): Response
    {
        $contactUs = new ContactUs();
        $form = $this->createForm(ContactUsType::class, $contactUs);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $email = (new Email())
                ->from($contactUs->getEmail())
                ->to('boukhchimoussama@gmail.com')
                ->subject('Contact Us Message')
                ->text($contactUs->getMessage());

            try {
                $mailer->send($email);
                $this->addFlash('success', 'Your message has been sent.');
                
            } catch (\Exception $ex) {
                $this->addFlash('error', 'Your message failed to send.');
            }
            return $this->redirectToRoute('app_home');
        }

        $courses = $courseRepo->findAll();
        $lessons = $lessonRepo->findAll();
        
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'form' => $form->createView(),
            'courses' => $courses,
            'lessons' => $lessons,
        ]);
    }

    #[Route('/test', name: 'app_test')]
    public function test(): Response
    {
        return $this->render('home/test.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
