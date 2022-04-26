<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReportController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        $data = [
            'title' => 'Home'
        ];
        return $this->render('home.html.twig', $data);
    }

    /**
     * @Route("/about", name="about")
     */
    public function about(): Response
    {
        $data = [
            'title' => 'about'
        ];
        return $this->render('about.html.twig', $data);
    }

    /**
     * @Route("/report", name="report")
     */
    public function report(): Response
    {
        return $this->render('report.html.twig');
    }
}
