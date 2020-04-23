<?php

namespace Drupal\hello_world\Logger;

use Drupal\Component\Render\FormattableMarkup;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Logger\LogMessageParserInterface;
use Drupal\Core\Logger\RfcLoggerTrait;
use Drupal\Core\Logger\RfcLogLevel;
use Psr\Log\LoggerInterface;

/**
 * A logger that sends an email when the log type is "error".
 */
class MailLogger implements LoggerInterface {

  use RfcLoggerTrait;

  /**
   * @var \Drupal\Core\Logger\LogMessageParserInterface
   */
  protected $parser;

  /**
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * MailLogger constructor.
   *
   * @param \Drupal\Core\Logger\LogMessageParserInterface $parser
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   */
  public function __construct(LogMessageParserInterface $parser, ConfigFactoryInterface $config_factory) {
    $this->parser = $parser;
    $this->configFactory = $config_factory;
  }

  /**
   * @{inheritdoc}
   */
  public function emergency($message, array $context = []) {
    // TODO: Implement emergency() method.
  }

  /**
   * @{inheritdoc}
   */
  public function alert($message, array $context = []) {
    // TODO: Implement alert() method.
  }

  /**
   * @{inheritdoc}
   */
  public function critical($message, array $context = []) {
    // TODO: Implement critical() method.
  }

  /**
   * @{inheritdoc}
   */
  public function error($message, array $context = []) {
    // TODO: Implement error() method.
  }

  /**
   * @{inheritdoc}
   */
  public function warning($message, array $context = []) {
    // TODO: Implement warning() method.
  }

  /**
   * @{inheritdoc}
   */
  public function notice($message, array $context = []) {
    // TODO: Implement notice() method.
  }

  /**
   * @{inheritdoc}
   */
  public function info($message, array $context = []) {
    // TODO: Implement info() method.
  }

  /**
   * @{inheritdoc}
   */
  public function debug($message, array $context = []) {
    // TODO: Implement debug() method.
  }

  /**
   * @{inheritdoc}
   */
  public function log($level, $message, array $context = []) {
    if ($level !== RfcLogLevel::ERROR) {
      return;
    }
    $to = $this->configFactory->get('system.site')->get('mail');
    $langcode = $this->configFactory->get('system.site')->get('langcode');
    $variables = $this->parser->parseMessagePlaceholders($message, $context);
    $markup = new FormattableMarkup($message, $variables);
    \Drupal::service('plugin.manager.mail')->mail('hello_world', 'hello_world_log', $to, $langcode, ['message' => $markup]);
  }

}
