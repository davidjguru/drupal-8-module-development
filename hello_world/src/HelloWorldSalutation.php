<?php

namespace Drupal\hello_world;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;

/**
 * Prepares the salutation to the world.
 */
class HelloWorldSalutation {

  use StringTranslationTrait;

  /**
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * HelloWorldSalutation constructor.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   */
  public function __construct(ConfigFactoryInterface $config_factory)
  {
    $this->configFactory = $config_factory;
  }

  /**
   * Returns the salutation.
   */
  public function getSalutation(){

    $config = $this->configFactory->get('hello_world.custom_salutation');
    $salutation = $config->get('salutation');
    $time = new \DateTime();
    $salute = '';

    if((int) $time->format('G') >= 00 && (int) $time->format('G') < 12) {
      $salute = $this->t('Good morning world!');
    }

    if((int) $time->format('G') >= 12 && (int) $time->format('G') < 18) {
      $salute = $this->t('Good afternoon world!');
    }

    if((int) $time->format('G') >= 18) {
      $salute = $this->t('Good evening world!');
    }

    if($salutation != ""){
      $salute .= ", " . $salutation;
    }

    return $salute;
  }
}
