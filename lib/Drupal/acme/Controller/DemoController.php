<?php

namespace Drupal\acme\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

use Drupal\Core\Template\TwigEnvironment;

/**
 * DemoController Controller
 */
class DemoController extends ControllerBase implements ContainerInjectionInterface {

 /**
  * @var TwigEnvironment
  */
  protected $twig;

 /**
   * Constructor
   *
   * @param TwigEnvironment $twig
   */
  public function __construct(TwigEnvironment $twig) {
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
    return $template->render(array('name' => $name));
  }

}
