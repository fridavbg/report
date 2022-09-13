<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\SectorRepository;
use App\Repository\PlasticProductionRepository;
use App\Repository\MismanagedPlasticRepository;
use App\Repository\PlasticLifetimeRepository;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

class ChartController extends AbstractController
{
    /***
     * Function to render sector chart
     */
    public function sectorChart(
        ChartBuilderInterface $chartBuilder,
        SectorRepository $sectorRepository,
    ): Response {
        $sectorChart = $chartBuilder->createChart(Chart::TYPE_DOUGHNUT);

        $sectorLabels = [];
        $sectorDatasets = [];

        $sector = $sectorRepository->findAll();

        foreach ($sector as $data) {
            $sectorLabels[] = $data->getName();
            $sectorDatasets[] = $data->getPrimaryPlasticProductionMillionTonnes();
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

        return $this->render('project/charts/sectorChart.html.twig', ['sectorChart' => $sectorChart]);
    }

    /***
     * Function to render plastic production chart
     */
    public function plasticProdChart(
        ChartBuilderInterface $chartBuilder,
        PlasticProductionRepository $plasticProdRepo,
    ): Response {
        $plasticProdChart = $chartBuilder->createChart(Chart::TYPE_LINE);

        $plasticProdLabels = [];
        $plasticProdDatasets = [];
        $plasticProduction = $plasticProdRepo->findAll();

        foreach ($plasticProduction as $data) {
            $plasticProdLabels[] = $data->getYear();
            $plasticProdDatasets[] = $data->getPlasticsProductionMillionTones();
        }

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

        return $this->render('project/charts/plasticProdChart.html.twig', ['plasticProdChart' => $plasticProdChart]);
    }

    /***
     * Function to render mismanaged plastic chart
     */
    public function mismaPlasticChart(
        ChartBuilderInterface $chartBuilder,
        MismanagedPlasticRepository $mismaPlasticRepo,
    ): Response {
        $mismaPlasticChart = $chartBuilder->createChart(Chart::TYPE_BAR);

        $mismaPlasticLabels = [];
        $mismaPlasticData = [];

        $mismanagedPlastic = $mismaPlasticRepo->findAll();

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
        return $this->render('project/charts/mismaPlasticChart.html.twig', ["mismaPlasticChart" => $mismaPlasticChart]);
    }

    /***
     * Function to render plastic life chart
     */
    public function plasticLifeChart(
        ChartBuilderInterface $chartBuilder,
        PlasticLifetimeRepository $plasticLifeRepo,
    ): Response {
        $plasticLifeChart = $chartBuilder->createChart(Chart::TYPE_BAR);

        $plasticLifeLabels = [];
        $plasticLifeData = [];

        $plasticLife = $plasticLifeRepo->findAll();

        foreach ($plasticLife as $data) {
            $plasticLifeLabels[] = $data->getSector();
            $plasticLifeData[] = $data->getLifetime();
        }

        $plasticLifeChart->setData([
            'labels' => $plasticLifeLabels,
            'datasets' => [
                [
                    'label' => 'Plastic Lifetime in years',
                    'backgroundColor' => [
                        'rgb(204, 204, 255)'
                    ],
                    'borderColor' => 'rgb(2, 12, 12)',
                    'data' => $plasticLifeData,
                ],
            ],
        ]);

        $plasticLifeChart->setOptions([
            'scales' => [
                'y' => [
                    'min' => 0,
                    'max' => 40,
                ],
            ],
        ]);

        return $this->render('project/charts/plasticLifeChart.html.twig', ["plasticLifeChart" => $plasticLifeChart]);
    }
}
