<?php

namespace Drupal\acme\Controller;

use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Slang Default Controller
 */
class DemoController implements ContainerInjectionInterface {
  
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
    $twigFilePath = drupal_get_path('module', 'acme') . '/templates/hello.html.twig';
    $template = $this->twig->loadTemplate($twigFilePath);
    drupal_set_title("Acme Demo Module");
    return $template->render(array('name' => $name));
  }

}
