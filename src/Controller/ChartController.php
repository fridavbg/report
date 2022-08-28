<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\SectorRepository;
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
}
