<?php

/**
 * Autor module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage Autor
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseAutorGeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'autor' : 'autor_'.$action;
  }
}
