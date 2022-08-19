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

        $sectorChart = $chartBuilder->createChart(Chart::TYPE_DOUGHNUT);

        $labels = [];
        $datasets = [];

        $plasticProduction = $plasticProductionRepository->findAll();
        $sector = $sectorRepository->findAll();
        $mismanagedPlastic = $mismanagedPlasticRepository->findAll();

        foreach ($sector as $data) {
            $labels[] = $data->getName();
            $datasets[] = $data->getPrimaryPlasticProductionMillionTonnes();
        }

        $sectorChart->setData([
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'My First dataset',
                    'backgroundColor' => [
                        'rgb(204, 204, 255)',
                        'rgb(204, 229, 255)',
                        'rgb(153, 204, 255)',
                        'rgb(51, 153, 255)',
                        'rgb(27, 126, 246)',
                    ],
                    'borderColor' => 'rgb(2, 12, 12)',
                    'data' => $datasets,
                ],
            ],
        ]);

        $sectorChart->setOptions([
            'maintainAspectRatio' => 'false',
        ]);


        $data = [
            'title' => 'MVC Kmom10',
            'mismanagedPlastic' => $mismanagedPlastic,
            'plasticProduction' => $plasticProduction,
            'sector' => $sector,
            'chart' => $sectorChart
        ];
        return $this->render('project/index.html.twig', $data);
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
