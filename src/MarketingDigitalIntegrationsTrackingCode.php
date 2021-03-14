<?php

namespace Drupal\marketing_digital_integrations;

use Drupal\Core\Render\Markup;

/**
 * Marketing Digital Integrations Tracking Code service.
 */
class MarketingDigitalIntegrationsTrackingCode implements MarketingDigitalIntegrationsTrackingCodeInterface {

  /**
   * MarketingDigitalIntegrationsConfigHelper.
   *
   * @var \Drupal\marketing_digital_integrations\MarketingDigitalIntegrationsTrackingCodeInterface
   */
  protected $marketingDigitalIntegrationsConfigHelper;

  /**
   * Create an MarketingDigitalIntegrationsTrackingCode object.
   *
   * @param \Drupal\marketing_digital_integrations\MarketingDigitalIntegrationsConfigHelperInterface $marketingDigitalIntegrationsConfigHelper
   *   The marketing config helper.
   */
  public function __construct(MarketingDigitalIntegrationsConfigHelperInterface $marketingDigitalIntegrationsConfigHelper) {
    $this->marketingDigitalIntegrationsConfigHelper = $marketingDigitalIntegrationsConfigHelper;
  }

  /**
   * {@inheritdoc}
   */
  public function addPrivyCode(&$page) {
    $config_values = $this->marketingDigitalIntegrationsConfigHelper->getTrackingConfigValues('use_privy', 'privy_code');

    if (empty($config_values['use_value']) || empty($config_values['code_value'])) {
      return;
    }

    // Adding Privy javascript script.
    $js = <<<PRIVY
   var _d_site = _d_site || '{$config_values['code_value']}';
PRIVY;
    $page['#attached']['html_head'][] = [
      [
        '#type' => 'html_tag',
        '#tag' => 'script',
        '#value' => Markup::create($js),
      ],
      'mdi-privy-js',
    ];

    // Adding Privy widget script.
    $page['#attached']['html_head'][] = [
      [
        '#type' => 'html_tag',
        '#tag' => 'script',
        '#attributes' => [
          'src' => 'https://widget.privy.com/assets/widget.js',
        ],
      ],
      'mdi-privy-widget-js',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function addGoogleAdwordsRemarketingTag(&$page) {
    $config_values = $this->marketingDigitalIntegrationsConfigHelper->getTrackingConfigValues('use_gar', 'gar_code');

    if (empty($config_values['use_value']) || empty($config_values['code_value'])) {
      return;
    }

    // Adding Google Adwords Remarketing Tag.
    $page['#attached']['html_head'][] = [
      [
        '#type' => 'html_tag',
        '#tag' => 'script',
        '#attributes' => [
          'async' => TRUE,
          'src' => "https://www.googletagmanager.com/gtag/js?id=AW-{$config_values['code_value']}",
        ],
      ],
      'mdi-google-adwords-remarketing-tag-js',
    ];

    // Adding Google Adwords Remarketing javascript script.
    $js = <<<GOOGLETAG
(function () {
   window.dataLayer = window.dataLayer || [];
   function gtag(){dataLayer.push(arguments);}
   gtag('js', new Date());

   gtag('config', 'AW-{$config_values['code_value']}');
})();
GOOGLETAG;
    $page['#attached']['html_head'][] = [
      [
        '#type' => 'html_tag',
        '#tag' => 'script',
        '#value' => Markup::create($js),
      ],
      'mdi-google-adwords-remarketing-js',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function addFacebookPixel(&$page) {
    $config_values = $this->marketingDigitalIntegrationsConfigHelper->getTrackingConfigValues('use_facebook_pixel', 'facebook_pixel_code');

    if (empty($config_values['use_value']) || empty($config_values['code_value'])) {
      return;
    }

    // Adding Facebook Pixel javascript script.
    $js = <<<FACEBOOKPIXEL
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '{$config_values['code_value']}');
  fbq('track', 'PageView');
FACEBOOKPIXEL;
    $page['#attached']['html_head'][] = [
      [
        '#type' => 'html_tag',
        '#tag' => 'script',
        '#value' => Markup::create($js),
      ],
      'mdi-facebook-pixel-script',
    ];

    // Adding Facebook Pixel javascript noscript.
    $page['#attached']['html_head'][] = [
      [
        '#type' => 'html_tag',
        '#tag' => 'noscript',
        '#value' => "<img height='1' width='1' style='display:none' src='https://www.facebook.com/tr?id={$config_values['code_value']}&ev=PageView&noscript=1' />"
      ],
      'mdi-facebook-pixel--noscript',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function addHubspot(&$page) {
    $config_values = $this->marketingDigitalIntegrationsConfigHelper->getTrackingConfigValues('use_hubspot', 'hubspot_code');

    if (empty($config_values['use_value']) || empty($config_values['code_value'])) {
      return;
    }

    // Adding Hubspot script.
    $page['#attached']['html_head'][] = [
      [
        '#type' => 'html_tag',
        '#tag' => 'script',
        '#attributes' => [
          'async' => TRUE,
          'src' => '//js.hs-scripts.com/' . $config_values['code_value'] . '.js',
        ],
      ],
      'mdi-hubspot-tag-js',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function addKlaviyo(&$page) {
    $config_values = $this->marketingDigitalIntegrationsConfigHelper->getTrackingConfigValues('use_klaviyo', 'klaviyo_code');

    if (empty($config_values['use_value']) || empty($config_values['code_value'])) {
      return;
    }

    // Adding Klaviyo script.
    $page['#attached']['html_head'][] = [
      [
        '#type' => 'html_tag',
        '#tag' => 'script',
        '#attributes' => [
          'async' => TRUE,
          'src' => "https://static.klaviyo.com/onsite/js/klaviyo.js?company_id={$config_values['code_value']}",
        ],
      ],
      'mdi-klaviyo-tag-js',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function addAdroll(&$page) {
    $config_values = $this->marketingDigitalIntegrationsConfigHelper->getTrackingConfigValues('use_adroll', 'adroll_adv_id');
    $adroll_adv_id = $config_values['code_value'];
    $adroll_pix_id = \Drupal::configFactory()->get('marketing_digital_integrations.affiliates_codes')->get('adroll_pix_id');

    if (empty($config_values['use_value']) || empty($adroll_adv_id) || empty($adroll_pix_id)) {
      return;
    }

    // Adding Adroll Tag.
    $js = <<<Adroll
    adroll_adv_id = "$adroll_adv_id";
    adroll_pix_id = "$adroll_pix_id";
    (function () {
        var _onload = function(){
            if (document.readyState && !/loaded|complete/.test(document.readyState)){setTimeout(_onload, 10);return}
            if (!window.__adroll_loaded){__adroll_loaded=true;setTimeout(_onload, 50);return}
            var scr = document.createElement("script");
            var host = (("https:" == document.location.protocol) ? "https://s.adroll.com" : "http://a.adroll.com");
            scr.setAttribute('async', 'true');
            scr.type = "text/javascript";
            scr.src = host + "/j/roundtrip.js";
            ((document.getElementsByTagName('head') || [null])[0] ||
                document.getElementsByTagName('script')[0].parentNode).appendChild(scr);
        };
        if (window.addEventListener) {window.addEventListener('load', _onload, false);}
        else {window.attachEvent('onload', _onload)}
    }());
Adroll;

    $page['#attached']['html_head'][] = [
      [
        '#type' => 'html_tag',
        '#tag' => 'script',
        '#value' => Markup::create($js),
      ],
      'mdi-adroll-tag-js',
    ];
  }

}
