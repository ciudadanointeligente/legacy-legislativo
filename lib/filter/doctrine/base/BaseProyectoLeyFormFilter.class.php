<?php

/**
 * ProyectoLey filter form base class.
 *
 * @package    vota
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseProyectoLeyFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nro_boletin'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'titulo'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fecha_ingreso'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'iniciativa'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'tipo'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'camara_origen'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'urgencia'          => new sfWidgetFormFilterInput(),
      'etapa'             => new sfWidgetFormFilterInput(),
      'sub_etapa'         => new sfWidgetFormFilterInput(),
      'ley'               => new sfWidgetFormFilterInput(),
      'ley_bcn'           => new sfWidgetFormFilterInput(),
      'decreto'           => new sfWidgetFormFilterInput(),
      'decreto_bcn'       => new sfWidgetFormFilterInput(),
      'fecha_publicacion' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'id_materia'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Materia'), 'add_empty' => true)),
      'nro_interno'       => new sfWidgetFormFilterInput(),
      'avance'            => new sfWidgetFormFilterInput(),
      'nro_tramitacion'   => new sfWidgetFormFilterInput(),
      'tramitacion_act'   => new sfWidgetFormFilterInput(),
      'resumen'           => new sfWidgetFormFilterInput(),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'nro_boletin'       => new sfValidatorPass(array('required' => false)),
      'titulo'            => new sfValidatorPass(array('required' => false)),
      'fecha_ingreso'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'iniciativa'        => new sfValidatorPass(array('required' => false)),
      'tipo'              => new sfValidatorPass(array('required' => false)),
      'camara_origen'     => new sfValidatorPass(array('required' => false)),
      'urgencia'          => new sfValidatorPass(array('required' => false)),
      'etapa'             => new sfValidatorPass(array('required' => false)),
      'sub_etapa'         => new sfValidatorPass(array('required' => false)),
      'ley'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ley_bcn'           => new sfValidatorPass(array('required' => false)),
      'decreto'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'decreto_bcn'       => new sfValidatorPass(array('required' => false)),
      'fecha_publicacion' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'id_materia'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Materia'), 'column' => 'id_materia')),
      'nro_interno'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'avance'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'nro_tramitacion'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'tramitacion_act'   => new sfValidatorPass(array('required' => false)),
      'resumen'           => new sfValidatorPass(array('required' => false)),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('proyecto_ley_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProyectoLey';
  }

  public function getFields()
  {
    return array(
      'id_proyecto_ley'   => 'Number',
      'nro_boletin'       => 'Text',
      'titulo'            => 'Text',
      'fecha_ingreso'     => 'Date',
      'iniciativa'        => 'Text',
      'tipo'              => 'Text',
      'camara_origen'     => 'Text',
      'urgencia'          => 'Text',
      'etapa'             => 'Text',
      'sub_etapa'         => 'Text',
      'ley'               => 'Number',
      'ley_bcn'           => 'Text',
      'decreto'           => 'Number',
      'decreto_bcn'       => 'Text',
      'fecha_publicacion' => 'Date',
      'id_materia'        => 'ForeignKey',
      'nro_interno'       => 'Number',
      'avance'            => 'Number',
      'nro_tramitacion'   => 'Number',
      'tramitacion_act'   => 'Text',
      'resumen'           => 'Text',
      'created_at'        => 'Date',
      'updated_at'        => 'Date',
    );
  }
}
