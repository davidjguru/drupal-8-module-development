<?php

namespace Drupal\hello_world;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Prepares the salutation to the world.
 */
class HelloWorldSalutation {

  use StringTranslationTrait;

  /**
   * @var \Symfony\Component\EventDispatcher\EventDispatcherInterface
   */
  protected $eventDispatcher;

  /**
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * HelloWorldSalutation constructor.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   * @param \Symfony\Component\EventDispatcher\EventDispatcherInterface $eventDispatcher
   */
  public function __construct(ConfigFactoryInterface $config_factory, EventDispatcherInterface $eventDispatcher) {
    $this->configFactory = $config_factory;
    $this->eventDispatcher = $eventDispatcher;
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
      $event = new SalutationEvent();
      $event->setValue($salutation);
      $event = $this->eventDispatcher->dispatch(SalutationEvent::EVENT, $event);
      return $event->getValue();
    }

    return $salute;
  }
}
