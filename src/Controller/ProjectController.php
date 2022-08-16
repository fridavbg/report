<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PlasticProductionRepository;
use App\Repository\SectorRepository;

class ProjectController extends AbstractController
{
    #[Route('/proj', name: 'project')]
    public function index(
        PlasticProductionRepository $plasticProductionRepository,
        SectorRepository $sectorRepository
    ): Response {
        $plasticProduction = $plasticProductionRepository->findAll();
        $sector = $sectorRepository->findAll();
        $data = [
            'title' => 'MVC Kmom10',
            'plasticProduction' => $plasticProduction,
            'sector' => $sector
        ];
        return $this->render('project/test.html.twig', $data);
    }
    #[Route('/proj/about', name: 'project-about')]
    public function about(): Response
    {
        $data = [
            'title' => 'About MVC Kmom10'
        ];
        return $this->render('project/about.html.twig', $data);
    }
    #[Route('/proj/reset', name: 'project-reset')]
    public function reset(): Response
    {
        $data = [
            'title' => 'Reset DB MVC Kmom10'
        ];
        return $this->render('project/reset.html.twig', $data);
    }
}
