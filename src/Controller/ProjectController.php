<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PlasticProductionRepository;
use App\Repository\MismanagedPlasticRepository;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

class ProjectController extends AbstractController
{
    #[Route('/proj', name: 'project')]
    public function index(
        ChartBuilderInterface $chartBuilder,
        PlasticProductionRepository $plasticProdRepo,
        MismanagedPlasticRepository $mismaPlasticRepo
    ): Response {

        $plasticProdChart = $chartBuilder->createChart(Chart::TYPE_LINE);
        $mismaPlasticChart = $chartBuilder->createChart(Chart::TYPE_BAR);

        $plasticProdLabels = [];
        $plasticProdDatasets = [];

        $mismaPlasticLabels = [];
        $mismaPlasticData = [];

        $plasticProduction = $plasticProdRepo->findAll();
        $mismanagedPlastic = $mismaPlasticRepo->findAll();

        foreach ($plasticProduction as $data) {
            $plasticProdLabels[] = $data->getYear();
            $plasticProdDatasets[] = $data->getPlasticsProductionMillionTones();
        }

        foreach ($mismanagedPlastic as $data) {
            $mismaPlasticLabels[] = $data->getCountry();
            $mismaPlasticData[] = $data->getProbabilityOfPlasticBeingEmittedToOcean();
        }

        $mismaPlasticChart->setData([
            'labels' => $mismaPlasticLabels,
            'datasets' => [
                [
                    'label' => 'Probability of mismanaged plastic per country 2019',
                    'backgroundColor' => [
                        'rgb(204, 204, 255)'
                    ],
                    'borderColor' => 'rgb(2, 12, 12)',
                    'data' => $mismaPlasticData,
                ],
            ],
        ]);

        $plasticProdChart->setData([
            'labels' => $plasticProdLabels,
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
                    'data' => $plasticProdDatasets,
                ],
            ],
        ]);

        $data = [
            'title' => 'Project MVC Kmom10',
            'mismanagedPlastic' => $mismanagedPlastic,
            'plasticProduction' => $plasticProduction,
            'plasticProdChart' => $plasticProdChart,
            'mismaPlasticChart' => $mismaPlasticChart
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

    #[Route('/proj/test', name: 'project-test')]
    public function test(): Response
    {
        $data = [
            'title' => 'Test MVC Kmom10'
        ];
        return $this->render('project/test.html.twig', $data);
    }
}
