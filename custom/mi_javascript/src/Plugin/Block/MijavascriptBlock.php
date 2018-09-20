<?php

namespace Drupal\mi_javascript\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Hello' Block.
 *
 * @Block(
 *   id = "mi_javascript",
 *   admin_label = @Translation("Java block"),
 *   category = @Translation("Java World"),
 * )
 */
class MijavascriptBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return array(
      '#theme' => 'mi_first_jquery',
      '#title' => 'bloque con javascript',
    );
  }


}