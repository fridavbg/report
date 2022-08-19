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
        $plasticProductionChart = $chartBuilder->createChart(Chart::TYPE_LINE);
        $mismanagedPlasticChart = $chartBuilder->createChart(Chart::TYPE_BAR);

        $sectorLabels = [];
        $sectorDatasets = [];

        $plasticProductionLabels = [];
        $plasticProductionDatasets = [];

        $mismanagedPlasticLabels = [];
        $mismanagedPlasticDatasets = [];

        $plasticProduction = $plasticProductionRepository->findAll();
        $sector = $sectorRepository->findAll();
        $mismanagedPlastic = $mismanagedPlasticRepository->findAll();

        foreach ($sector as $data) {
            $sectorLabels[] = $data->getName();
            $sectorDatasets[] = $data->getPrimaryPlasticProductionMillionTonnes();
        }

        foreach ($plasticProduction as $data) {
            $plasticProductionLabels[] = $data->getYear();
            $plasticProductionDatasets[] = $data->getPlasticsProductionMillionTones();
        }

        foreach ($mismanagedPlastic as $data) {
            $mismanagedPlasticLabels[] = $data->getCountry();
            $mismanagedPlasticDatasets[] = $data->getProbabilityOfPlasticBeingEmittedToOcean();
        }

        $sectorChart->setData([
            'labels' => $sectorLabels,
            'datasets' => [
                [
                    'label' => 'Plastic production by sector',
                    'backgroundColor' => [
                        'rgb(204, 204, 255)',
                        'rgb(204, 229, 255)',
                        'rgb(153, 204, 255)',
                        'rgb(51, 153, 255)',
                        'rgb(27, 126, 246)',
                    ],
                    'borderColor' => 'rgb(2, 12, 12)',
                    'data' => $sectorDatasets,
                ],
            ],
        ]);

        $mismanagedPlasticChart->setData([
            'labels' => $mismanagedPlasticLabels,
            'datasets' => [
                [
                    'label' => 'Probability of mismanaged plastic per country 2019',
                    'backgroundColor' => [
                        'rgb(204, 204, 255)'
                    ],
                    'borderColor' => 'rgb(2, 12, 12)',
                    'data' => $mismanagedPlasticDatasets,
                ],
            ],
        ]);

        $plasticProductionChart->setData([
            'labels' => $plasticProductionLabels,
            'datasets' => [
                [
                    'label' => 'Global Plastic Producton',
                    'backgroundColor' => [
                        'rgb(204, 204, 255)',
                        'rgb(204, 229, 255)',
                        'rgb(153, 204, 255)',
                        'rgb(51, 153, 255)',
                        'rgb(27, 126, 246)',
                    ],
                    'borderColor' => 'rgb(2, 12, 12)',
                    'data' => $plasticProductionDatasets,
                ],
            ],
        ]);

        $data = [
            'title' => 'MVC Kmom10',
            'mismanagedPlastic' => $mismanagedPlastic,
            'plasticProduction' => $plasticProduction,
            'sector' => $sector,
            'plasticProductionChart' => $plasticProductionChart,
            'sectorChart' => $sectorChart,
            'mismanagedPlasticChart' => $mismanagedPlasticChart
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
