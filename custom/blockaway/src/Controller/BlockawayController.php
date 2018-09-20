<?php

namespace Drupal\blockaway\Controller;

use Drupal\Core\Controller\ControllerBase;


class BlockawayController extends ControllerBase{

  /**
   * @return array
   */
  public function getBlockawayImplementation() {
    $build['myelement'] = [
      '#theme' => 'blockaway',
    ];

    $build['myelement']['#attached']['library'][] = 'blockaway/blockaway.namespace';
    return $build;
  }
}