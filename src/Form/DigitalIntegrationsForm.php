<?php

namespace Drupal\marketing_digital_integrations\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Digital Integrations configuration form.
 */
class DigitalIntegrationsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'marketing_digital_integrations.affiliates_codes',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'marketing_digital_integrations_affiliates_config';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('marketing_digital_integrations.affiliates_codes');

    $form['privy'] = [
      '#type' => 'details',
      '#title' => t('Privy'),
      '#open' => TRUE,
    ];

    $form['privy']['use_privy'] = [
      '#type' => 'checkbox',
      '#title' => t('Enable'),
      '#default_value' => $config->get('use_privy'),
    ];

    $form['privy']['configurable_privy_wrapper'] = [
      '#type' => 'container',
      '#states' => [
        'invisible' => [
          'input[name="use_privy"]' => ['checked' => FALSE],
        ],
      ],
    ];

    $form['privy']['configurable_privy_wrapper']['privy_code'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Privy Code'),
      '#default_value' => $config->get('privy_code'),
    ];

    $form['gar'] = [
      '#type' => 'details',
      '#title' => t('Google Adwords ReMarketing'),
      '#open' => TRUE,
    ];

    $form['gar']['use_gar'] = [
      '#type' => 'checkbox',
      '#title' => t('Enable'),
      '#default_value' => $config->get('use_gar'),
    ];

    $form['gar']['configurable_gar_wrapper'] = [
      '#type' => 'container',
      '#states' => [
        'invisible' => [
          'input[name="use_gar"]' => ['checked' => FALSE],
        ],
      ],
    ];

    $form['gar']['configurable_gar_wrapper']['gar_code'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Google Adwords ReMarketing Code'),
      '#default_value' => $config->get('gar_code'),
    ];

    $form['facebook_pixel'] = [
      '#type' => 'details',
      '#title' => t('Facebook Pixel'),
      '#open' => TRUE,
    ];

    $form['facebook_pixel']['use_facebook_pixel'] = [
      '#type' => 'checkbox',
      '#title' => t('Enable'),
      '#default_value' => $config->get('use_facebook_pixel'),
    ];

    $form['facebook_pixel']['configurable_facebook_pixel_wrapper'] = [
      '#type' => 'container',
      '#states' => [
        'invisible' => [
          'input[name="use_facebook_pixel"]' => ['checked' => FALSE],
        ],
      ],
    ];

    $form['facebook_pixel']['configurable_facebook_pixel_wrapper']['facebook_pixel_code'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Facebook Pixel Code'),
      '#default_value' => $config->get('facebook_pixel_code'),
    ];

    $form['hubspot'] = [
      '#type' => 'details',
      '#title' => t('Hubspot'),
      '#open' => TRUE,
    ];

    $form['hubspot']['use_hubspot'] = [
      '#type' => 'checkbox',
      '#title' => t('Enable'),
      '#default_value' => $config->get('use_hubspot'),
    ];

    $form['hubspot']['configurable_hubspot_wrapper'] = [
      '#type' => 'container',
      '#states' => [
        'invisible' => [
          'input[name="use_hubspot"]' => ['checked' => FALSE],
        ],
      ],
    ];

    $form['hubspot']['configurable_hubspot_wrapper']['hubspot_code'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Hubspot Code'),
      '#default_value' => $config->get('hubspot_code'),
    ];

    $form['klaviyo'] = [
      '#type' => 'details',
      '#title' => t('Klaviyo'),
      '#open' => TRUE,
    ];

    $form['klaviyo']['use_klaviyo'] = [
      '#type' => 'checkbox',
      '#title' => t('Enable'),
      '#default_value' => $config->get('use_klaviyo'),
    ];

    $form['klaviyo']['configurable_klaviyo_wrapper'] = [
      '#type' => 'container',
      '#states' => [
        'invisible' => [
          'input[name="use_klaviyo"]' => ['checked' => FALSE],
        ],
      ],
    ];

    $form['klaviyo']['configurable_klaviyo_wrapper']['klaviyo_code'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Klaviyo Code'),
      '#default_value' => $config->get('klaviyo_code'),
    ];

    $form['adroll'] = [
      '#type' => 'details',
      '#title' => t('Adroll'),
      '#open' => TRUE,
    ];

    $form['adroll']['use_adroll'] = [
      '#type' => 'checkbox',
      '#title' => t('Enable'),
      '#default_value' => $config->get('use_adroll'),
    ];

    $form['adroll']['configurable_adroll_wrapper'] = [
      '#type' => 'container',
      '#states' => [
        'invisible' => [
          'input[name="use_adroll"]' => ['checked' => FALSE],
        ],
      ],
    ];

    $form['adroll']['configurable_adroll_wrapper']['adroll_adv_id'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Adroll Adv Id'),
      '#default_value' => $config->get('adroll_adv_id'),
    ];

    $form['adroll']['configurable_adroll_wrapper']['adroll_pix_id'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Adroll Pix Id'),
      '#default_value' => $config->get('adroll_pix_id'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('marketing_digital_integrations.affiliates_codes')
      ->set('use_privy', $form_state->getValue('use_privy'))
      ->set('privy_code', $form_state->getValue('privy_code'))
      ->set('use_gar', $form_state->getValue('use_gar'))
      ->set('gar_code', $form_state->getValue('gar_code'))
      ->set('use_facebook_pixel', $form_state->getValue('use_facebook_pixel'))
      ->set('facebook_pixel_code', $form_state->getValue('facebook_pixel_code'))
      ->set('use_hubspot', $form_state->getValue('use_hubspot'))
      ->set('hubspot_code', $form_state->getValue('hubspot_code'))
      ->set('use_klaviyo', $form_state->getValue('use_klaviyo'))
      ->set('klaviyo_code', $form_state->getValue('klaviyo_code'))
      ->set('use_adroll', $form_state->getValue('use_adroll'))
      ->set('adroll_adv_id', $form_state->getValue('adroll_adv_id'))
      ->set('adroll_pix_id', $form_state->getValue('adroll_pix_id'))
      ->save();
  }

}
