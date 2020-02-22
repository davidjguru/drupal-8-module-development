<?php

namespace Drupal\hello_world\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\hello_world\HelloWorldSalutation;
use Drupal\user\UserInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Controller for the salutation message.
 */
class HelloWorldController extends ControllerBase{

  /**
   * @var \Drupal\hello_world\HelloWorldSalutation
   */
  protected $salutation;

  /**
   * HelloWorldController constructor.
   *
   * @param \Drupal\hello_world\HelloWorldSalutation $salutation
   */
  public function __construct(HelloWorldSalutation $salutation){
    $this->salutation = $salutation;
  }

  /**
   * { @inheritdoc }
   */
  public static function create(ContainerInterface $container){
    return new static(
      $container->get('hello_world.salutation')
    );
}

  /**
   * Hello World.
   *
   * @return array
   */
  public function helloWorld() {
    return [
      '#markup' => $this->t('Hello World') . '<br>' .
                   $this->salutation->getSalutation(),
    ];
  }

  /**
   * Hello Name.
   *
   * @return array
   */
  public function helloName($name) {
    return [
      '#markup' => $this->t('Hello World, dear: ' . $name),
    ];
  }

  /**
   * Hello User.
   *
   * @return array
   */
  public function helloUser(UserInterface $user) {
    return [
      '#markup' => $this->t('Hello User: @user',
                   ['@user' => $user->getDisplayName()]),
    ];
  }

  /**
   * Hello Name Default.
   *
   * @return array
   */
  public function helloNameDefault($name) {
    return [
      '#markup' => $this->t('Hello World, dear: ' . $name),
    ];
  }

}
