<?php

namespace Drupal\form_add_html_attributes;

use Drupal\Core\Config\ConfigFactoryInterface;

/**
 * Class AddHtmlAttributesServices to define Utility functions.
 *
 * @package Drupal\alm_api\form_add_html_attributes
 */
class AddHtmlAttributesServices {

  /**
   * @var Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $config_factory;

  /**
   * @var Drupal\Core\Http\ClientFactory
   */

  /**
   * Constructs a new MostPopularArticle object.
   *
   * @param Drupal\Core\Http\ClientFactory $config_factory
   */
  public function __construct(ConfigFactoryInterface $config_factory) {
    $this->config_factory =  $config_factory;
  }
}