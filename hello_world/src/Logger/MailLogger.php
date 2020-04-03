<?php

namespace Drupal\hello_world\Logger;

use Drupal\Core\Logger\RfcLoggerTrait;
use Psr\Log\LoggerInterface;

/**
 *  A logger that sends an email when the log type is "error".
 */
class MailLogger implements LoggerInterface{

  use RfcLoggerTrait;

  /**
   * @{inheritdoc}
   */
  public function emergency($message, array $context = array())
  {
    // TODO: Implement emergency() method.
  }

  /**
   * @{inheritdoc}
   */
  public function alert($message, array $context = array())
  {
    // TODO: Implement alert() method.
  }

  /**
   * @{inheritdoc}
   */
  public function critical($message, array $context = array())
  {
    // TODO: Implement critical() method.
  }

  /**
   * @{inheritdoc}
   */
  public function error($message, array $context = array())
  {
    // TODO: Implement error() method.
  }

  /**
   * @{inheritdoc}
   */
  public function warning($message, array $context = array())
  {
    // TODO: Implement warning() method.
  }

  /**
   * @{inheritdoc}
   */
  public function notice($message, array $context = array())
  {
    // TODO: Implement notice() method.
  }

  /**
   * @{inheritdoc}
   */
  public function info($message, array $context = array())
  {
    // TODO: Implement info() method.
  }

  /**
   * @{inheritdoc}
   */
  public function debug($message, array $context = array())
  {
    // TODO: Implement debug() method.
  }

  /**
   * @{inheritdoc}
   */
  public function log($level, $message, array $context = array())
  {
    // TODO: Implement log() method.
  }
}