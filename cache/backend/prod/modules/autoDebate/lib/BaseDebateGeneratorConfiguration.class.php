<?php

/**
 * Debate module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage Debate
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseDebateGeneratorConfiguration extends sfModelGeneratorConfiguration
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
    return '%%=proyecto_ley%% - %%fecha%% - %%tema%% - %%camara%% - %%comision_sala%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Gestión de Debates';
  }

  public function getEditTitle()
  {
    return 'Edit Debate';
  }

  public function getNewTitle()
  {
    return 'New Debate';
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
    return array(  0 => '=proyecto_ley',  1 => 'fecha',  2 => 'tema',  3 => 'camara',  4 => 'comision_sala',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id_debate' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'id_proyecto_ley' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'comision_sala' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'comisiones_unidas' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'camara' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'fecha' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'hora' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Time',),
      'discusion' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'tema' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'debate' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'tags' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'docs' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'created_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'updated_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'comision_list' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id_debate' => array(),
      'id_proyecto_ley' => array(),
      'comision_sala' => array(),
      'comisiones_unidas' => array(),
      'camara' => array(),
      'fecha' => array(),
      'hora' => array(),
      'discusion' => array(),
      'tema' => array(),
      'debate' => array(),
      'tags' => array(),
      'docs' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'comision_list' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id_debate' => array(),
      'id_proyecto_ley' => array(),
      'comision_sala' => array(),
      'comisiones_unidas' => array(),
      'camara' => array(),
      'fecha' => array(),
      'hora' => array(),
      'discusion' => array(),
      'tema' => array(),
      'debate' => array(),
      'tags' => array(),
      'docs' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'comision_list' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id_debate' => array(),
      'id_proyecto_ley' => array(),
      'comision_sala' => array(),
      'comisiones_unidas' => array(),
      'camara' => array(),
      'fecha' => array(),
      'hora' => array(),
      'discusion' => array(),
      'tema' => array(),
      'debate' => array(),
      'tags' => array(),
      'docs' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'comision_list' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id_debate' => array(),
      'id_proyecto_ley' => array(),
      'comision_sala' => array(),
      'comisiones_unidas' => array(),
      'camara' => array(),
      'fecha' => array(),
      'hora' => array(),
      'discusion' => array(),
      'tema' => array(),
      'debate' => array(),
      'tags' => array(),
      'docs' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'comision_list' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id_debate' => array(),
      'id_proyecto_ley' => array(),
      'comision_sala' => array(),
      'comisiones_unidas' => array(),
      'camara' => array(),
      'fecha' => array(),
      'hora' => array(),
      'discusion' => array(),
      'tema' => array(),
      'debate' => array(),
      'tags' => array(),
      'docs' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'comision_list' => array(),
    );
  }


  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'DebateForm';
  }

  public function hasFilterForm()
  {
    return false;
  }

  /**
   * Gets the filter form class name
   *
   * @return string The filter form class name associated with this generator
   */
  public function getFilterFormClass()
  {
    return 'DebateFormFilter';
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
