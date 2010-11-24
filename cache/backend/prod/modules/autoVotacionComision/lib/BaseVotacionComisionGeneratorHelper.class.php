<?php

/**
 * VotacionComision module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage VotacionComision
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseVotacionComisionGeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'votacion_comision' : 'votacion_comision_'.$action;
  }
}
