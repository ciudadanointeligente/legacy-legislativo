<?php

/**
 * Partido filter form base class.
 *
 * @package    vota
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasePartidoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sigla'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fecha_nacimiento'   => new sfWidgetFormFilterInput(),
      'mesa_adulta'        => new sfWidgetFormFilterInput(),
      'mesa_juventud'      => new sfWidgetFormFilterInput(),
      'nro_diputados_2010' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nro_senadores_2010' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'direccion'          => new sfWidgetFormFilterInput(),
      'telefono'           => new sfWidgetFormFilterInput(),
      'mail'               => new sfWidgetFormFilterInput(),
      'web'                => new sfWidgetFormFilterInput(),
      'historia'           => new sfWidgetFormFilterInput(),
      'principios'         => new sfWidgetFormFilterInput(),
      'created_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'nombre'             => new sfValidatorPass(array('required' => false)),
      'sigla'              => new sfValidatorPass(array('required' => false)),
      'fecha_nacimiento'   => new sfValidatorPass(array('required' => false)),
      'mesa_adulta'        => new sfValidatorPass(array('required' => false)),
      'mesa_juventud'      => new sfValidatorPass(array('required' => false)),
      'nro_diputados_2010' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'nro_senadores_2010' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'direccion'          => new sfValidatorPass(array('required' => false)),
      'telefono'           => new sfValidatorPass(array('required' => false)),
      'mail'               => new sfValidatorPass(array('required' => false)),
      'web'                => new sfValidatorPass(array('required' => false)),
      'historia'           => new sfValidatorPass(array('required' => false)),
      'principios'         => new sfValidatorPass(array('required' => false)),
      'created_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('partido_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Partido';
  }

  public function getFields()
  {
    return array(
      'id_partido'         => 'Number',
      'nombre'             => 'Text',
      'sigla'              => 'Text',
      'fecha_nacimiento'   => 'Text',
      'mesa_adulta'        => 'Text',
      'mesa_juventud'      => 'Text',
      'nro_diputados_2010' => 'Number',
      'nro_senadores_2010' => 'Number',
      'direccion'          => 'Text',
      'telefono'           => 'Text',
      'mail'               => 'Text',
      'web'                => 'Text',
      'historia'           => 'Text',
      'principios'         => 'Text',
      'created_at'         => 'Date',
      'updated_at'         => 'Date',
    );
  }
}
