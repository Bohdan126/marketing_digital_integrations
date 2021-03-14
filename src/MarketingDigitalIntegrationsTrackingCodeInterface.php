<?php

namespace Drupal\marketing_digital_integrations;

interface MarketingDigitalIntegrationsTrackingCodeInterface {

  /**
   * Add Privy tracking code.
   *
   * @param array $page
   *   HTML head array.
   */
  public function addPrivyCode(&$page);

  /**
   * Add Google Adwords Remarketing tag.
   *
   * @param array $page
   *   HTML head array.
   */
  public function addGoogleAdwordsRemarketingTag(&$page);

  /**
   * Add Facebook Pixel tracking code.
   *
   * @param array $page
   *   HTML head array.
   */
  public function addFacebookPixel(&$page);

  /**
   * Add Hubspot tracking code.
   *
   * @param array $page
   *   HTML head array.
   */
  public function addHubspot(&$page);

  /**
   * Add Klaviyo tracking code.
   *
   * @param array $page
   *   HTML head array.
   */
  public function addKlaviyo(&$page);

  /**
   * Add Adroll tracking code.
   *
   * @param array $page
   *   HTML head array.
   */
  public function addAdroll(&$page);
}
