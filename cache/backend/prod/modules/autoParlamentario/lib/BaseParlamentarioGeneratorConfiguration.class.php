<?php

/**
 * Parlamentario module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage Parlamentario
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseParlamentarioGeneratorConfiguration extends sfModelGeneratorConfiguration
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
    return '%%=nombre%% - %%apellidos%% - %%senador_diputado%% - %%id_circunscripcion%% - %%id_distrito%% - %%pacto%% - %%partido%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Gestión de Parlamentarios';
  }

  public function getEditTitle()
  {
    return 'Edit Parlamentario';
  }

  public function getNewTitle()
  {
    return 'New Parlamentario';
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
    return array(  0 => '=nombre',  1 => 'apellidos',  2 => 'senador_diputado',  3 => 'id_circunscripcion',  4 => 'id_distrito',  5 => 'pacto',  6 => 'partido',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id_parlamentario' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'nombre' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'apellidos' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'senador_diputado' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'id_circunscripcion' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'id_distrito' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'pacto' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'id_partido' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'sexo' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'fecha_nacimiento' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'profesion' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'mesa_directiva' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'periodos_senador' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'periodos_diputado' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'periodos_senador_desc' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'periodos_diputado_desc' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'primera_vez' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'comisiones_anteriores' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'comisiones_actuales' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'voto_nro' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'voto_porcentaje' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'gasto_electoral2005' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'financiamiento_electoral2005' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'gasto_electoral2009' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'financiamiento_electoral2009' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'comite_parlamentario' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'mail' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'web' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'twitter' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'facebook' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'dietas' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'declaracion_interes' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'declaracion_patrimonio' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'educacion_universitaria' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'educacion_postgrado' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'cargos_gobierno' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'cargos_eleccion' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'experiencia_politica' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'experiencia_laboral' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'id_parlamento' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'activo' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'created_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'updated_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'votacion_list' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'votacion_comision_list' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'comision_list' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id_parlamentario' => array(),
      'nombre' => array(),
      'apellidos' => array(),
      'senador_diputado' => array(),
      'id_circunscripcion' => array(),
      'id_distrito' => array(),
      'pacto' => array(),
      'id_partido' => array(),
      'sexo' => array(),
      'fecha_nacimiento' => array(),
      'profesion' => array(),
      'mesa_directiva' => array(),
      'periodos_senador' => array(),
      'periodos_diputado' => array(),
      'periodos_senador_desc' => array(),
      'periodos_diputado_desc' => array(),
      'primera_vez' => array(),
      'comisiones_anteriores' => array(),
      'comisiones_actuales' => array(),
      'voto_nro' => array(),
      'voto_porcentaje' => array(),
      'gasto_electoral2005' => array(),
      'financiamiento_electoral2005' => array(),
      'gasto_electoral2009' => array(),
      'financiamiento_electoral2009' => array(),
      'comite_parlamentario' => array(),
      'mail' => array(),
      'web' => array(),
      'twitter' => array(),
      'facebook' => array(),
      'dietas' => array(),
      'declaracion_interes' => array(),
      'declaracion_patrimonio' => array(),
      'educacion_universitaria' => array(),
      'educacion_postgrado' => array(),
      'cargos_gobierno' => array(),
      'cargos_eleccion' => array(),
      'experiencia_politica' => array(),
      'experiencia_laboral' => array(),
      'id_parlamento' => array(),
      'activo' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'votacion_list' => array(),
      'votacion_comision_list' => array(),
      'comision_list' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id_parlamentario' => array(),
      'nombre' => array(),
      'apellidos' => array(),
      'senador_diputado' => array(),
      'id_circunscripcion' => array(),
      'id_distrito' => array(),
      'pacto' => array(),
      'id_partido' => array(),
      'sexo' => array(),
      'fecha_nacimiento' => array(),
      'profesion' => array(),
      'mesa_directiva' => array(),
      'periodos_senador' => array(),
      'periodos_diputado' => array(),
      'periodos_senador_desc' => array(),
      'periodos_diputado_desc' => array(),
      'primera_vez' => array(),
      'comisiones_anteriores' => array(),
      'comisiones_actuales' => array(),
      'voto_nro' => array(),
      'voto_porcentaje' => array(),
      'gasto_electoral2005' => array(),
      'financiamiento_electoral2005' => array(),
      'gasto_electoral2009' => array(),
      'financiamiento_electoral2009' => array(),
      'comite_parlamentario' => array(),
      'mail' => array(),
      'web' => array(),
      'twitter' => array(),
      'facebook' => array(),
      'dietas' => array(),
      'declaracion_interes' => array(),
      'declaracion_patrimonio' => array(),
      'educacion_universitaria' => array(),
      'educacion_postgrado' => array(),
      'cargos_gobierno' => array(),
      'cargos_eleccion' => array(),
      'experiencia_politica' => array(),
      'experiencia_laboral' => array(),
      'id_parlamento' => array(),
      'activo' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'votacion_list' => array(),
      'votacion_comision_list' => array(),
      'comision_list' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id_parlamentario' => array(),
      'nombre' => array(),
      'apellidos' => array(),
      'senador_diputado' => array(),
      'id_circunscripcion' => array(),
      'id_distrito' => array(),
      'pacto' => array(),
      'id_partido' => array(),
      'sexo' => array(),
      'fecha_nacimiento' => array(),
      'profesion' => array(),
      'mesa_directiva' => array(),
      'periodos_senador' => array(),
      'periodos_diputado' => array(),
      'periodos_senador_desc' => array(),
      'periodos_diputado_desc' => array(),
      'primera_vez' => array(),
      'comisiones_anteriores' => array(),
      'comisiones_actuales' => array(),
      'voto_nro' => array(),
      'voto_porcentaje' => array(),
      'gasto_electoral2005' => array(),
      'financiamiento_electoral2005' => array(),
      'gasto_electoral2009' => array(),
      'financiamiento_electoral2009' => array(),
      'comite_parlamentario' => array(),
      'mail' => array(),
      'web' => array(),
      'twitter' => array(),
      'facebook' => array(),
      'dietas' => array(),
      'declaracion_interes' => array(),
      'declaracion_patrimonio' => array(),
      'educacion_universitaria' => array(),
      'educacion_postgrado' => array(),
      'cargos_gobierno' => array(),
      'cargos_eleccion' => array(),
      'experiencia_politica' => array(),
      'experiencia_laboral' => array(),
      'id_parlamento' => array(),
      'activo' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'votacion_list' => array(),
      'votacion_comision_list' => array(),
      'comision_list' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id_parlamentario' => array(),
      'nombre' => array(),
      'apellidos' => array(),
      'senador_diputado' => array(),
      'id_circunscripcion' => array(),
      'id_distrito' => array(),
      'pacto' => array(),
      'id_partido' => array(),
      'sexo' => array(),
      'fecha_nacimiento' => array(),
      'profesion' => array(),
      'mesa_directiva' => array(),
      'periodos_senador' => array(),
      'periodos_diputado' => array(),
      'periodos_senador_desc' => array(),
      'periodos_diputado_desc' => array(),
      'primera_vez' => array(),
      'comisiones_anteriores' => array(),
      'comisiones_actuales' => array(),
      'voto_nro' => array(),
      'voto_porcentaje' => array(),
      'gasto_electoral2005' => array(),
      'financiamiento_electoral2005' => array(),
      'gasto_electoral2009' => array(),
      'financiamiento_electoral2009' => array(),
      'comite_parlamentario' => array(),
      'mail' => array(),
      'web' => array(),
      'twitter' => array(),
      'facebook' => array(),
      'dietas' => array(),
      'declaracion_interes' => array(),
      'declaracion_patrimonio' => array(),
      'educacion_universitaria' => array(),
      'educacion_postgrado' => array(),
      'cargos_gobierno' => array(),
      'cargos_eleccion' => array(),
      'experiencia_politica' => array(),
      'experiencia_laboral' => array(),
      'id_parlamento' => array(),
      'activo' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'votacion_list' => array(),
      'votacion_comision_list' => array(),
      'comision_list' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id_parlamentario' => array(),
      'nombre' => array(),
      'apellidos' => array(),
      'senador_diputado' => array(),
      'id_circunscripcion' => array(),
      'id_distrito' => array(),
      'pacto' => array(),
      'id_partido' => array(),
      'sexo' => array(),
      'fecha_nacimiento' => array(),
      'profesion' => array(),
      'mesa_directiva' => array(),
      'periodos_senador' => array(),
      'periodos_diputado' => array(),
      'periodos_senador_desc' => array(),
      'periodos_diputado_desc' => array(),
      'primera_vez' => array(),
      'comisiones_anteriores' => array(),
      'comisiones_actuales' => array(),
      'voto_nro' => array(),
      'voto_porcentaje' => array(),
      'gasto_electoral2005' => array(),
      'financiamiento_electoral2005' => array(),
      'gasto_electoral2009' => array(),
      'financiamiento_electoral2009' => array(),
      'comite_parlamentario' => array(),
      'mail' => array(),
      'web' => array(),
      'twitter' => array(),
      'facebook' => array(),
      'dietas' => array(),
      'declaracion_interes' => array(),
      'declaracion_patrimonio' => array(),
      'educacion_universitaria' => array(),
      'educacion_postgrado' => array(),
      'cargos_gobierno' => array(),
      'cargos_eleccion' => array(),
      'experiencia_politica' => array(),
      'experiencia_laboral' => array(),
      'id_parlamento' => array(),
      'activo' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'votacion_list' => array(),
      'votacion_comision_list' => array(),
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
    return 'ParlamentarioForm';
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
    return 'ParlamentarioFormFilter';
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
