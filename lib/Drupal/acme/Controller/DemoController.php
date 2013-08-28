<?php

namespace Drupal\slang\Controller;

use Drupal\Core\Controller\ControllerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Slang Default Controller
 */
class DemoController implements ControllerInterface {
  
 /**
  * @var \TwigEnvironment
  */
  protected $twig;

 /**
   * Constructor
   *
   * @param \TwigEnvironment $twig
   */
  public function __construct(\TwigEnvironment $twig) {
    $this->twig = $twig;
  }

 /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static($container->get('twig'));
  }

  /**
   * helloAction
   *
   * @param String $name
   */
  public function helloAction($name) {
    $twig = $this->twig;
    $path = drupal_get_path('module', 'slang') . '/templates/example.html.twig';
    $template = $twig->loadTemplate($path);
    drupal_set_title("Slang demo");
    return $template->render(array('name' => $name));
  }

}
