<?php

/**
 * Parlamentario module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage Parlamentario
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseParlamentarioGeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'parlamentario_Parlamentario' : 'parlamentario_Parlamentario_'.$action;
  }
}
