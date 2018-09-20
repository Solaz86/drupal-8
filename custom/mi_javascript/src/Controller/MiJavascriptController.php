<?php

namespace Drupal\mi_javascript\Controller;

//use Drupal\Core\StringTranslation\StringTranslationTrait;
//use Drupal\examples\Utility\DescriptionTemplateTrait;

/**
 * Controller for Hooks example description page.
 *
 * This class uses the DescriptionTemplateTrait to display text we put in the
 * templates/description.html.twig file.
 */
class MiJavascriptController {

//  use DescriptionTemplateTrait;

  /**
   * Name of our module.
   *
   * @return string
   *   A module name.
   */
  protected function getModuleName() {
    return 'mi_javascript';
  }

  /**
   * Implementacion del efecto array de JQuery de Drupal
   *
   * @return array
   * A renderable array
   */
  public function getJsAccordionImplementation() {
    $title = 'Haz click para expandir';

    $build['myelement'] = [
      '#theme' => 'mi_javascript_accordion',
      '#title' => $title
    ];

    $build['myelement']['#attached']['library'][] = 'mi_javascript/mi_javascript.accordion';
    return $build;
  }

  /**
   * Implementacion del efecto fade de Jquery, ejercicio de ProDrupalDevelopment
   *
   * @return array
   * A renderable array
   */
  public function getMyFirstJqueryImplementation() {
    $build['myelement'] = [
      '#theme' => 'mi_first_jquery',
    ];

    $build['mielement']['#attached']['library'][] = 'mi_javascript/mi_javascript.myfirstjquery';
    return $build;
  }
}