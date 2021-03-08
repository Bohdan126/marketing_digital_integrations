<?php

namespace Drupal\marketing_digital_integrations;

interface MarketingDigitalIntegrationsConfigHelperInterface {

  /**
   * Gets configs values from Config Factory service.
   *
   * @param string $use_config
   *   Name of 'use' config.
   * @param string $code_config
   *   Name of 'code' config.
   *
   * @return array
   *   Array of 'use' and 'code' configs values.
   */
  public function getTrackingConfigValues($use_config, $code_config);

}
