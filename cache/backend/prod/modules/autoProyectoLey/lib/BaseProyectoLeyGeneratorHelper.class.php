<?php

/**
 * ProyectoLey module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage ProyectoLey
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseProyectoLeyGeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'proyecto_ley' : 'proyecto_ley_'.$action;
  }
}
