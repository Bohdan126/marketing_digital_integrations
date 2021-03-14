<?php

namespace Drupal\marketing_digital_integrations\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Defines a Marketing cloud item annotation object.
 *
 * @see \Drupal\marketing_digital_integrations\Plugin\MarketingCloudManager
 * @see plugin_api
 *
 * @Annotation
 */
class MarketingCloud extends Plugin {


  /**
   * The plugin ID.
   *
   * @var string
   */
  public $id;

  /**
   * The label of the plugin.
   *
   * @var \Drupal\Core\Annotation\Translation
   *
   * @ingroup plugin_translatable
   */
  public $label;

}
