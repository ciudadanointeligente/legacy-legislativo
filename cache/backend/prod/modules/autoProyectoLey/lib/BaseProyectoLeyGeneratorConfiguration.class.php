<?php

/**
 * ProyectoLey module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage ProyectoLey
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseProyectoLeyGeneratorConfiguration extends sfModelGeneratorConfiguration
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
    return '%%=nro_boletin%% - %%titulo%% - %%fecha_ingreso%% - %%iniciativa%% - %%etapa%% - %%sub_etapa%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Gestión de Proyectos de Ley';
  }

  public function getEditTitle()
  {
    return 'Editar Proyecto de Ley';
  }

  public function getNewTitle()
  {
    return 'Nuevo Proyecto de Ley';
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
    return array(  0 => '=nro_boletin',  1 => 'titulo',  2 => 'fecha_ingreso',  3 => 'iniciativa',  4 => 'etapa',  5 => 'sub_etapa',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id_proyecto_ley' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'nro_boletin' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'titulo' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'titulo_sesion' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'fecha_ingreso' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'iniciativa' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'tipo' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'camara_origen' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'urgencia' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'etapa' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'sub_etapa' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'ley' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'ley_bcn' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'decreto' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'decreto_bcn' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'fecha_publicacion' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'id_materia' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'nro_interno' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'avance' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'nro_tramitacion' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'tramitacion_act' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'resumen' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'created_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'updated_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'comision_list' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'sesion_list' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'proyecto_ley_list' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id_proyecto_ley' => array(),
      'nro_boletin' => array(),
      'titulo' => array(),
      'titulo_sesion' => array(),
      'fecha_ingreso' => array(),
      'iniciativa' => array(),
      'tipo' => array(),
      'camara_origen' => array(),
      'urgencia' => array(),
      'etapa' => array(),
      'sub_etapa' => array(),
      'ley' => array(),
      'ley_bcn' => array(),
      'decreto' => array(),
      'decreto_bcn' => array(),
      'fecha_publicacion' => array(),
      'id_materia' => array(),
      'nro_interno' => array(),
      'avance' => array(),
      'nro_tramitacion' => array(),
      'tramitacion_act' => array(),
      'resumen' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'comision_list' => array(),
      'sesion_list' => array(),
      'proyecto_ley_list' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id_proyecto_ley' => array(),
      'nro_boletin' => array(),
      'titulo' => array(),
      'titulo_sesion' => array(),
      'fecha_ingreso' => array(),
      'iniciativa' => array(),
      'tipo' => array(),
      'camara_origen' => array(),
      'urgencia' => array(),
      'etapa' => array(),
      'sub_etapa' => array(),
      'ley' => array(),
      'ley_bcn' => array(),
      'decreto' => array(),
      'decreto_bcn' => array(),
      'fecha_publicacion' => array(),
      'id_materia' => array(),
      'nro_interno' => array(),
      'avance' => array(),
      'nro_tramitacion' => array(),
      'tramitacion_act' => array(),
      'resumen' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'comision_list' => array(),
      'sesion_list' => array(),
      'proyecto_ley_list' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id_proyecto_ley' => array(),
      'nro_boletin' => array(),
      'titulo' => array(),
      'titulo_sesion' => array(),
      'fecha_ingreso' => array(),
      'iniciativa' => array(),
      'tipo' => array(),
      'camara_origen' => array(),
      'urgencia' => array(),
      'etapa' => array(),
      'sub_etapa' => array(),
      'ley' => array(),
      'ley_bcn' => array(),
      'decreto' => array(),
      'decreto_bcn' => array(),
      'fecha_publicacion' => array(),
      'id_materia' => array(),
      'nro_interno' => array(),
      'avance' => array(),
      'nro_tramitacion' => array(),
      'tramitacion_act' => array(),
      'resumen' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'comision_list' => array(),
      'sesion_list' => array(),
      'proyecto_ley_list' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id_proyecto_ley' => array(),
      'nro_boletin' => array(),
      'titulo' => array(),
      'titulo_sesion' => array(),
      'fecha_ingreso' => array(),
      'iniciativa' => array(),
      'tipo' => array(),
      'camara_origen' => array(),
      'urgencia' => array(),
      'etapa' => array(),
      'sub_etapa' => array(),
      'ley' => array(),
      'ley_bcn' => array(),
      'decreto' => array(),
      'decreto_bcn' => array(),
      'fecha_publicacion' => array(),
      'id_materia' => array(),
      'nro_interno' => array(),
      'avance' => array(),
      'nro_tramitacion' => array(),
      'tramitacion_act' => array(),
      'resumen' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'comision_list' => array(),
      'sesion_list' => array(),
      'proyecto_ley_list' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id_proyecto_ley' => array(),
      'nro_boletin' => array(),
      'titulo' => array(),
      'titulo_sesion' => array(),
      'fecha_ingreso' => array(),
      'iniciativa' => array(),
      'tipo' => array(),
      'camara_origen' => array(),
      'urgencia' => array(),
      'etapa' => array(),
      'sub_etapa' => array(),
      'ley' => array(),
      'ley_bcn' => array(),
      'decreto' => array(),
      'decreto_bcn' => array(),
      'fecha_publicacion' => array(),
      'id_materia' => array(),
      'nro_interno' => array(),
      'avance' => array(),
      'nro_tramitacion' => array(),
      'tramitacion_act' => array(),
      'resumen' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'comision_list' => array(),
      'sesion_list' => array(),
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
    return 'ProyectoLeyForm';
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
    return 'ProyectoLeyFormFilter';
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
    return array('fecha_ingreso', 'desc');
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
