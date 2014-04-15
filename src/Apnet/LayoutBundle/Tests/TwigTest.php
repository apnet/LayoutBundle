<?php

/**
 * Twig blocks test
 *
 * @author Andrey F. Mindubaev <covex.mobile@gmail.com>
 * @license http://opensource.org/licenses/MIT  MIT License
 */
namespace Apnet\LayoutBundle\Tests;

use Apnet\FunctionalTestBundle\Framework\WebTestCase;
use Symfony\Component\HttpFoundation\Request;

/**
 * Twig blocks test
 */
class TwigTest extends WebTestCase
{

  /**
   * Test
   *
   * @return null
   */
  public function testTemplate()
  {
    $template = $this->_getTwig()
      ->loadTemplate("ApnetLayoutBundle::body.html.twig");
    /* @var $template \Twig_Template */
    $content = $template->render(array());

    $this->assertTrue(is_string($content), "Always true when no errors");
  }

  /**
   * Test blocks
   *
   * @param string $name Block name
   *
   * @return null
   * @dataProvider providerBlocks
   */
  public function testBlock($name)
  {
    $template = $this->_getTwig()
      ->loadTemplate("ApnetLayoutBundle::body.html.twig");
    /* @var $template \Twig_Template */

    $this->assertTrue(
      $template->hasBlock($name . "_wrapper"), "Block %name%_wrapper ($name)"
    );
    $this->assertTrue(
      $template->hasBlock($name), "Block %name% ($name)"
    );
    $this->assertTrue(
      $template->hasBlock($name . "_core", "Block %name%_core ($name)")
    );
  }

  /**
   * Data provider for testBlock
   *
   * @return array
   */
  public function providerBlocks()
  {
    return array(
      array("head"),
      array("stylesheets"),
      array("body"),
      array("javascripts")
    );
  }

  /**
   * Load twig from container
   *
   * @return \Twig_Environment
   */
  private function _getTwig()
  {
    $client = self::createClient();
    $container = $client->getContainer();
    $container->enterScope('request');
    $container->set('request', new Request(), 'request');

    return $container->get('twig');
  }

}
