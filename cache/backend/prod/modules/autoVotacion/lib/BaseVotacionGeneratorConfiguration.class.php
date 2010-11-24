<?php

/**
 * Votacion module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage Votacion
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseVotacionGeneratorConfiguration extends sfModelGeneratorConfiguration
{
  public function getActionsDefault()
  {
    return array();
  }

  public function getFormActions()
  {
    return array(  '_delete' => NULL,  '_list' => NULL,  '_save' => NULL,  '_save_and_add' => NULL,);
  }

  public function getNewActions()
  {
    return array();
  }

  public function getEditActions()
  {
    return array();
  }

  public function getListObjectActions()
  {
    return array(  '_edit' => NULL,  '_delete' => NULL,);
  }

  public function getListActions()
  {
    return array(  '_new' => NULL,);
  }

  public function getListBatchActions()
  {
    return array(  '_delete' => NULL,);
  }

  public function getListParams()
  {
    return '%%=name%% - %%fecha%% - %%camara%% - %%tipo%% - %%articulo%% - %%materia%% - %%resultado%% - %%id_parlamento%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Gestión de Votaciones';
  }

  public function getEditTitle()
  {
    return 'Edit Votacion';
  }

  public function getNewTitle()
  {
    return 'New Votacion';
  }

  public function getFilterDisplay()
  {
    return array();
  }

  public function getFormDisplay()
  {
    return array();
  }

  public function getEditDisplay()
  {
    return array();
  }

  public function getNewDisplay()
  {
    return array();
  }

  public function getListDisplay()
  {
    return array(  0 => '=name',  1 => 'fecha',  2 => 'camara',  3 => 'tipo',  4 => 'articulo',  5 => 'materia',  6 => 'resultado',  7 => 'id_parlamento',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id_votacion' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'name' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'camara' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'en_sala' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'tipo' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'articulo' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'materia' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'fecha' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'hora' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Time',),
      'voto_si' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'voto_no' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'voto_abs' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'voto_disp' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'voto_pareos' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'voto_aus' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'resultado' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'quorum' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'id_proyecto_ley' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'id_sesion' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'id_debate' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'id_parlamento' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'visible' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'created_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'updated_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'parlamentario_list' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id_votacion' => array(),
      'name' => array(),
      'camara' => array(),
      'en_sala' => array(),
      'tipo' => array(),
      'articulo' => array(),
      'materia' => array(),
      'fecha' => array(),
      'hora' => array(),
      'voto_si' => array(),
      'voto_no' => array(),
      'voto_abs' => array(),
      'voto_disp' => array(),
      'voto_pareos' => array(),
      'voto_aus' => array(),
      'resultado' => array(),
      'quorum' => array(),
      'id_proyecto_ley' => array(),
      'id_sesion' => array(),
      'id_debate' => array(),
      'id_parlamento' => array(),
      'visible' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'parlamentario_list' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id_votacion' => array(),
      'name' => array(),
      'camara' => array(),
      'en_sala' => array(),
      'tipo' => array(),
      'articulo' => array(),
      'materia' => array(),
      'fecha' => array(),
      'hora' => array(),
      'voto_si' => array(),
      'voto_no' => array(),
      'voto_abs' => array(),
      'voto_disp' => array(),
      'voto_pareos' => array(),
      'voto_aus' => array(),
      'resultado' => array(),
      'quorum' => array(),
      'id_proyecto_ley' => array(),
      'id_sesion' => array(),
      'id_debate' => array(),
      'id_parlamento' => array(),
      'visible' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'parlamentario_list' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id_votacion' => array(),
      'name' => array(),
      'camara' => array(),
      'en_sala' => array(),
      'tipo' => array(),
      'articulo' => array(),
      'materia' => array(),
      'fecha' => array(),
      'hora' => array(),
      'voto_si' => array(),
      'voto_no' => array(),
      'voto_abs' => array(),
      'voto_disp' => array(),
      'voto_pareos' => array(),
      'voto_aus' => array(),
      'resultado' => array(),
      'quorum' => array(),
      'id_proyecto_ley' => array(),
      'id_sesion' => array(),
      'id_debate' => array(),
      'id_parlamento' => array(),
      'visible' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'parlamentario_list' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id_votacion' => array(),
      'name' => array(),
      'camara' => array(),
      'en_sala' => array(),
      'tipo' => array(),
      'articulo' => array(),
      'materia' => array(),
      'fecha' => array(),
      'hora' => array(),
      'voto_si' => array(),
      'voto_no' => array(),
      'voto_abs' => array(),
      'voto_disp' => array(),
      'voto_pareos' => array(),
      'voto_aus' => array(),
      'resultado' => array(),
      'quorum' => array(),
      'id_proyecto_ley' => array(),
      'id_sesion' => array(),
      'id_debate' => array(),
      'id_parlamento' => array(),
      'visible' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'parlamentario_list' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id_votacion' => array(),
      'name' => array(),
      'camara' => array(),
      'en_sala' => array(),
      'tipo' => array(),
      'articulo' => array(),
      'materia' => array(),
      'fecha' => array(),
      'hora' => array(),
      'voto_si' => array(),
      'voto_no' => array(),
      'voto_abs' => array(),
      'voto_disp' => array(),
      'voto_pareos' => array(),
      'voto_aus' => array(),
      'resultado' => array(),
      'quorum' => array(),
      'id_proyecto_ley' => array(),
      'id_sesion' => array(),
      'id_debate' => array(),
      'id_parlamento' => array(),
      'visible' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'parlamentario_list' => array(),
    );
  }


  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'VotacionForm';
  }

  public function hasFilterForm()
  {
    return true;
  }

  /**
   * Gets the filter form class name
   *
   * @return string The filter form class name associated with this generator
   */
  public function getFilterFormClass()
  {
    return 'VotacionFormFilter';
  }

  public function getPagerClass()
  {
    return 'sfDoctrinePager';
  }

  public function getPagerMaxPerPage()
  {
    return 20;
  }

  public function getDefaultSort()
  {
    return array('fecha', 'desc');
  }

  public function getTableMethod()
  {
    return '';
  }

  public function getTableCountMethod()
  {
    return '';
  }
}
