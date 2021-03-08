<?php

namespace Drupal\marketing_digital_integrations;

use Drupal\Core\Config\ConfigFactoryInterface;

/**
 * Marketing Digital Integrations Config Helper service.
 */
class MarketingDigitalIntegrationsConfigHelper implements MarketingDigitalIntegrationsConfigHelperInterface{

  /**
   * The config factory.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * Create an MarketingDigitalIntegrationsConfigHelper object.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The config factory.
   */
  public function __construct(ConfigFactoryInterface $config_factory) {
    $this->configFactory = $config_factory;
  }

  /**
   * {@inheritdoc}
   */
  public function getTrackingConfigValues($use_config, $code_config) {
    $use_value = $this->configFactory->get('marketing_digital_integrations.affiliates_codes')->get($use_config);
    $code_value = $this->configFactory->get('marketing_digital_integrations.affiliates_codes')->get($code_config);

    return [
      'use_value' => $use_value,
      'code_value' => $code_value,
    ];
  }

}
