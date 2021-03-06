<?php

namespace Drupal\sayhello\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormState;

/**
 *
 * @Block(
 *   id = "sayhello_block",
 *   admin_label = @Translation("Say Hello block"),
 * )
 */
class SayhelloBlock extends BlockBase {

  /**
   * Builds and returns the renderable array for this block plugin.
   *
   * If a block should not be rendered because it has no content, then this
   * method must also ensure to return no content: it must then only return an
   * empty array, or an empty array with #cache set (with cacheability metadata
   * indicating the circumstances for it being empty).
   *
   * @return array
   *   A renderable array representing the content of the block.
   *
   * @see \Drupal\block\BlockViewBuilder
   */
  public function build() {
    return \Drupal::formBuilder()->getForm('Drupal\sayhello\Form\SayhelloBlockForm');
  }
}

