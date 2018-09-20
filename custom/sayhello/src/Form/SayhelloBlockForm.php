<?php

namespace Drupal\sayhello\Form;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\ReplaceCommand;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Class SayhelloBlockForm
 *
 * @package Drupal\sayhello\Form
 */
class SayhelloBlockForm extends FormBase {

  /**
   * Returns a unique string identifying the form.
   *
   * The returned ID should be a unique string that can be a valid PHP function
   * name, since it's used in hook implementation names such as
   * hook_form_FORM_ID_alter().
   *
   * @return string
   *   The unique string identifying the form.
   */
  public function getFormId() {
    return 'sayhello_block_form';
  }

  /**
   * Form constructor.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   *
   * @return array
   *   The form structure.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    // TODO: Implement buildForm() method.

    $form['container']['output'] = [
      '#type' => 'textfield',
      '#size' => '60',
      '#disabled' => TRUE,
      '#value' => 'Hello, World!',
      '#attributes' => [
        'id' => ['edit-output'],
      ],
    ];

    $form['container']['output1'] = [
      '#type' => 'textfield',
      '#size' => '60',
      '#disabled' => TRUE,
      '#value' => 'Hello, Caca!',
      '#attributes' => [
        'id' => ['edit-caca'],
      ],
    ];

    $form['input'] = [
      '#type' => 'textfield',
      '#title' => 'A Textfield',
      '#description' => 'Enter a number to be validated via ajax.',
      '#size' => '60',
      '#maxlength' => '10',
//      '#required' => TRUE,
      '#ajax' => [
        'callback' => 'Drupal\sayhello\Form\SayhelloBlockForm::sayHello',
        'event' => 'keyup',
        'wrapper' => 'edit-caca',
        'progress' => [
          'type' => 'throbber',
          'message' => t('Verifying entry...'),
        ],
      ],
    ];

    $form['container']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Generate'),
    );

    return $form;
  }


  /**
   * @inheritdoc
   * @param array $form
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *
   * @return array
   */
  public function sayHello(array &$form, FormStateInterface $form_state) {
    $elem = [
      '#type' => 'textfield',
      '#size' => '60',
      '#disabled' => TRUE,
      '#value' => 'Hello, ' . $form_state->getValue('input') . '!',
      '#attributes' => [
        'id' => ['edit-caca'],
      ],
    ];

    return ['#markup' => \Drupal::service('renderer')->render($elem)];
  }

  public function sayHelloAjax(array &$form, FormStateInterface $form_state) {
    $elem = [
      '#type' => 'textfield',
      '#size' => '60',
      '#disabled' => TRUE,
      '#value' => 'Hello, ' . $form_state->getValue('input') . '!',
      '#attributes' => [
        'id' => ['edit-output'],
      ],
    ];
    $renderer = \Drupal::service('renderer');
    $response = new AjaxResponse();
    $response->addCommand(new ReplaceCommand('#edit-output', $renderer->render($elem)));
    return $response;
  }


  /**
   * Form submission handler.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $host = \Drupal::request()->getSchemeAndHttpHost();
    $path = '/admin/config';
    $url = $host . $path;
    $response = new RedirectResponse( $url );
    return $response->send();
  }
}