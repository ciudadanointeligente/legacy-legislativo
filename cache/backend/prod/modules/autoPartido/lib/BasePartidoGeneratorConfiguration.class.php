<?php

/**
 * Partido module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage Partido
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasePartidoGeneratorConfiguration extends sfModelGeneratorConfiguration
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
    return '%%=nombre%% - %%sigla%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Gestión de Partidos';
  }

  public function getEditTitle()
  {
    return 'Edit Partido';
  }

  public function getNewTitle()
  {
    return 'New Partido';
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
    return array(  0 => '=nombre',  1 => 'sigla',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id_partido' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'nombre' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'sigla' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'fecha_nacimiento' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'mesa_adulta' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'mesa_juventud' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'nro_diputados_2010' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'nro_senadores_2010' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'direccion' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'telefono' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'mail' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'web' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'historia' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'principios' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'created_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'updated_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id_partido' => array(),
      'nombre' => array(),
      'sigla' => array(),
      'fecha_nacimiento' => array(),
      'mesa_adulta' => array(),
      'mesa_juventud' => array(),
      'nro_diputados_2010' => array(),
      'nro_senadores_2010' => array(),
      'direccion' => array(),
      'telefono' => array(),
      'mail' => array(),
      'web' => array(),
      'historia' => array(),
      'principios' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id_partido' => array(),
      'nombre' => array(),
      'sigla' => array(),
      'fecha_nacimiento' => array(),
      'mesa_adulta' => array(),
      'mesa_juventud' => array(),
      'nro_diputados_2010' => array(),
      'nro_senadores_2010' => array(),
      'direccion' => array(),
      'telefono' => array(),
      'mail' => array(),
      'web' => array(),
      'historia' => array(),
      'principios' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id_partido' => array(),
      'nombre' => array(),
      'sigla' => array(),
      'fecha_nacimiento' => array(),
      'mesa_adulta' => array(),
      'mesa_juventud' => array(),
      'nro_diputados_2010' => array(),
      'nro_senadores_2010' => array(),
      'direccion' => array(),
      'telefono' => array(),
      'mail' => array(),
      'web' => array(),
      'historia' => array(),
      'principios' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id_partido' => array(),
      'nombre' => array(),
      'sigla' => array(),
      'fecha_nacimiento' => array(),
      'mesa_adulta' => array(),
      'mesa_juventud' => array(),
      'nro_diputados_2010' => array(),
      'nro_senadores_2010' => array(),
      'direccion' => array(),
      'telefono' => array(),
      'mail' => array(),
      'web' => array(),
      'historia' => array(),
      'principios' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id_partido' => array(),
      'nombre' => array(),
      'sigla' => array(),
      'fecha_nacimiento' => array(),
      'mesa_adulta' => array(),
      'mesa_juventud' => array(),
      'nro_diputados_2010' => array(),
      'nro_senadores_2010' => array(),
      'direccion' => array(),
      'telefono' => array(),
      'mail' => array(),
      'web' => array(),
      'historia' => array(),
      'principios' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }


  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'PartidoForm';
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
    return 'PartidoFormFilter';
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
