<?php

namespace Drupal\marketing_digital_integrations\Plugin\TagCloud;

use Drupal\marketing_digital_integrations\Plugin\MarketingCloudBase;

/**
 * Default tag cloud style.
 *
 * @MarketingCloud(
 *  id = "marketing_cloud",
 *  label = @Translation("Marketing Cloud"),
 * )
 */
class MarketingCloud extends MarketingCloudBase {

  /**
   * {@inheritdoc}
   */
  public function build($tags) {
    $build = parent::build($tags);

    return $build;
  }

}
