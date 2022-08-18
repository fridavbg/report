<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PlasticProductionRepository;
use App\Repository\SectorRepository;
use App\Repository\MismanagedPlasticRepository;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;


class ProjectController extends AbstractController
{
    #[Route('/proj', name: 'project')]
    public function index(
        ChartBuilderInterface $chartBuilder,
        PlasticProductionRepository $plasticProductionRepository,
        SectorRepository $sectorRepository,
        MismanagedPlasticRepository $mismanagedPlasticRepository 
    ): Response {

        $chart = $chartBuilder->createChart(Chart::TYPE_LINE);

        $chart->setData([
            'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            'datasets' => [
                [
                    'label' => 'My First dataset',
                    'backgroundColor' => 'rgb(255, 99, 132)',
                    'borderColor' => 'rgb(255, 99, 132)',
                    'data' => [0, 10, 5, 2, 20, 30, 45],
                ],
            ],
        ]);

        $plasticProduction = $plasticProductionRepository->findAll();
        $sector = $sectorRepository->findAll();
        $mismanagedPlastic = $mismanagedPlasticRepository->findAll();
        $data = [
            'title' => 'MVC Kmom10',
            'mismanagedPlastic' => $mismanagedPlastic,
            'plasticProduction' => $plasticProduction,
            'sector' => $sector,
            'chart' => $chart
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
