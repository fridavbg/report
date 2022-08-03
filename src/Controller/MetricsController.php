<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MetricsController extends AbstractController
{
    #[Route('/metrics', name: 'app_metrics')]
    public function index(): Response
    {
        $data = [
            'title' => 'Metrics analysis',
        ];
        return $this->render('metrics/index.html.twig', $data);
    }
}
