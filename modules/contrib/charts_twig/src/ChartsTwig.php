<?php


namespace Drupal\charts_twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * Class ChartsTwig Extension.
 *
 * @package Drupal\charts_twig
 */
class ChartsTwig extends AbstractExtension {

  /**
   * {@inheritdoc}
   */
  public function getFunctions() {
    return [
      new TwigFunction('chart', [$this, 'createChart']),
    ];
  }

  /*
   * Returns a chart given the required parameters. See README for details.
   *
   */
  public function createChart($id, $chart_type, $title, $chart_data, $xaxis, $yaxis, $options) {

    $chart = [];
    $chart[$id] = [
      '#type' => 'chart',
      '#chart_type' => $chart_type,
      '#title' => $title ? t($title) : '',
      '#raw_options' => $options,
    ];

    foreach ($chart_data as $key => $chart_datum) {
      $chart[$id]['series_' . $key] = [
        '#type' => 'chart_data',
        '#title' => $chart_datum['title'] ? t($chart_datum['title']) : '',
        '#data' => $chart_datum['data'] ?? [],
      ];
    }
    $chart[$id]['xaxis'] = [
      '#type' => 'chart_xaxis',
      '#title' => $xaxis['title'] ? t($xaxis['title']) : '',
      '#labels' => $xaxis['labels'] ?? [],
    ];
    $chart[$id]['yaxis'] = [
      '#type' => 'chart_yaxis',
      '#title' => $yaxis['title'] ? t($yaxis['title']) : '',
    ];

    return $chart;
  }

}
