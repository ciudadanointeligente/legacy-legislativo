<?php

/**
 * Comision module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage Comision
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseComisionGeneratorConfiguration extends sfModelGeneratorConfiguration
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
    return '%%=nombre%% - %%camara%% - %%tipo%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Gestión de Comisiones';
  }

  public function getEditTitle()
  {
    return 'Edit Comision';
  }

  public function getNewTitle()
  {
    return 'New Comision';
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
    return array(  0 => '=nombre',  1 => 'camara',  2 => 'tipo',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id_comision' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'nombre' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'tipo' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'camara' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'contacto_mail' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'contacto_tel' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'contacto_form' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'abogado_secretario' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'abogado_ayudante' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'secretario_ejecutivo' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'created_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'updated_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'debate_list' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'parlamentario_list' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'proyecto_ley_list' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id_comision' => array(),
      'nombre' => array(),
      'tipo' => array(),
      'camara' => array(),
      'contacto_mail' => array(),
      'contacto_tel' => array(),
      'contacto_form' => array(),
      'abogado_secretario' => array(),
      'abogado_ayudante' => array(),
      'secretario_ejecutivo' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'debate_list' => array(),
      'parlamentario_list' => array(),
      'proyecto_ley_list' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id_comision' => array(),
      'nombre' => array(),
      'tipo' => array(),
      'camara' => array(),
      'contacto_mail' => array(),
      'contacto_tel' => array(),
      'contacto_form' => array(),
      'abogado_secretario' => array(),
      'abogado_ayudante' => array(),
      'secretario_ejecutivo' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'debate_list' => array(),
      'parlamentario_list' => array(),
      'proyecto_ley_list' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id_comision' => array(),
      'nombre' => array(),
      'tipo' => array(),
      'camara' => array(),
      'contacto_mail' => array(),
      'contacto_tel' => array(),
      'contacto_form' => array(),
      'abogado_secretario' => array(),
      'abogado_ayudante' => array(),
      'secretario_ejecutivo' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'debate_list' => array(),
      'parlamentario_list' => array(),
      'proyecto_ley_list' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id_comision' => array(),
      'nombre' => array(),
      'tipo' => array(),
      'camara' => array(),
      'contacto_mail' => array(),
      'contacto_tel' => array(),
      'contacto_form' => array(),
      'abogado_secretario' => array(),
      'abogado_ayudante' => array(),
      'secretario_ejecutivo' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'debate_list' => array(),
      'parlamentario_list' => array(),
      'proyecto_ley_list' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id_comision' => array(),
      'nombre' => array(),
      'tipo' => array(),
      'camara' => array(),
      'contacto_mail' => array(),
      'contacto_tel' => array(),
      'contacto_form' => array(),
      'abogado_secretario' => array(),
      'abogado_ayudante' => array(),
      'secretario_ejecutivo' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'debate_list' => array(),
      'parlamentario_list' => array(),
      'proyecto_ley_list' => array(),
    );
  }


  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'ComisionForm';
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
    return 'ComisionFormFilter';
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
    return array('nombre', 'asc');
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
