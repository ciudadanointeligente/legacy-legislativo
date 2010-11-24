<?php

/**
 * Parlamentario filter form base class.
 *
 * @package    vota
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseParlamentarioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'                       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'apellidos'                    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'senador_diputado'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_circunscripcion'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Circunscripcion'), 'add_empty' => true)),
      'id_distrito'                  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Distrito'), 'add_empty' => true)),
      'pacto'                        => new sfWidgetFormFilterInput(),
      'id_partido'                   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Partido'), 'add_empty' => true)),
      'sexo'                         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fecha_nacimiento'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'profesion'                    => new sfWidgetFormFilterInput(),
      'periodos_senador'             => new sfWidgetFormFilterInput(),
      'periodos_diputado'            => new sfWidgetFormFilterInput(),
      'periodos_senador_desc'        => new sfWidgetFormFilterInput(),
      'periodos_diputado_desc'       => new sfWidgetFormFilterInput(),
      'primera_vez'                  => new sfWidgetFormFilterInput(),
      'comisiones_anteriores'        => new sfWidgetFormFilterInput(),
      'comisiones_actuales'          => new sfWidgetFormFilterInput(),
      'voto_nro'                     => new sfWidgetFormFilterInput(),
      'voto_porcentaje'              => new sfWidgetFormFilterInput(),
      'gasto_electoral2005'          => new sfWidgetFormFilterInput(),
      'financiamiento_electoral2005' => new sfWidgetFormFilterInput(),
      'gasto_electoral2009'          => new sfWidgetFormFilterInput(),
      'financiamiento_electoral2009' => new sfWidgetFormFilterInput(),
      'comite_parlamentario'         => new sfWidgetFormFilterInput(),
      'mail'                         => new sfWidgetFormFilterInput(),
      'web'                          => new sfWidgetFormFilterInput(),
      'twitter'                      => new sfWidgetFormFilterInput(),
      'facebook'                     => new sfWidgetFormFilterInput(),
      'dietas'                       => new sfWidgetFormFilterInput(),
      'declaracion_interes'          => new sfWidgetFormFilterInput(),
      'declaracion_patrimonio'       => new sfWidgetFormFilterInput(),
      'educacion_universitaria'      => new sfWidgetFormFilterInput(),
      'educacion_postgrado'          => new sfWidgetFormFilterInput(),
      'cargos_gobierno'              => new sfWidgetFormFilterInput(),
      'cargos_eleccion'              => new sfWidgetFormFilterInput(),
      'experiencia_politica'         => new sfWidgetFormFilterInput(),
      'experiencia_laboral'          => new sfWidgetFormFilterInput(),
      'created_at'                   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'                   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'nombre'                       => new sfValidatorPass(array('required' => false)),
      'apellidos'                    => new sfValidatorPass(array('required' => false)),
      'senador_diputado'             => new sfValidatorPass(array('required' => false)),
      'id_circunscripcion'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Circunscripcion'), 'column' => 'id_circunscripcion')),
      'id_distrito'                  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Distrito'), 'column' => 'id_distrito')),
      'pacto'                        => new sfValidatorPass(array('required' => false)),
      'id_partido'                   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Partido'), 'column' => 'id_partido')),
      'sexo'                         => new sfValidatorPass(array('required' => false)),
      'fecha_nacimiento'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'profesion'                    => new sfValidatorPass(array('required' => false)),
      'periodos_senador'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'periodos_diputado'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'periodos_senador_desc'        => new sfValidatorPass(array('required' => false)),
      'periodos_diputado_desc'       => new sfValidatorPass(array('required' => false)),
      'primera_vez'                  => new sfValidatorPass(array('required' => false)),
      'comisiones_anteriores'        => new sfValidatorPass(array('required' => false)),
      'comisiones_actuales'          => new sfValidatorPass(array('required' => false)),
      'voto_nro'                     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'voto_porcentaje'              => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'gasto_electoral2005'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'financiamiento_electoral2005' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'gasto_electoral2009'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'financiamiento_electoral2009' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'comite_parlamentario'         => new sfValidatorPass(array('required' => false)),
      'mail'                         => new sfValidatorPass(array('required' => false)),
      'web'                          => new sfValidatorPass(array('required' => false)),
      'twitter'                      => new sfValidatorPass(array('required' => false)),
      'facebook'                     => new sfValidatorPass(array('required' => false)),
      'dietas'                       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'declaracion_interes'          => new sfValidatorPass(array('required' => false)),
      'declaracion_patrimonio'       => new sfValidatorPass(array('required' => false)),
      'educacion_universitaria'      => new sfValidatorPass(array('required' => false)),
      'educacion_postgrado'          => new sfValidatorPass(array('required' => false)),
      'cargos_gobierno'              => new sfValidatorPass(array('required' => false)),
      'cargos_eleccion'              => new sfValidatorPass(array('required' => false)),
      'experiencia_politica'         => new sfValidatorPass(array('required' => false)),
      'experiencia_laboral'          => new sfValidatorPass(array('required' => false)),
      'created_at'                   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'                   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('parlamentario_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Parlamentario';
  }

  public function getFields()
  {
    return array(
      'id_parlamentario'             => 'Number',
      'nombre'                       => 'Text',
      'apellidos'                    => 'Text',
      'senador_diputado'             => 'Text',
      'id_circunscripcion'           => 'ForeignKey',
      'id_distrito'                  => 'ForeignKey',
      'pacto'                        => 'Text',
      'id_partido'                   => 'ForeignKey',
      'sexo'                         => 'Text',
      'fecha_nacimiento'             => 'Date',
      'profesion'                    => 'Text',
      'periodos_senador'             => 'Number',
      'periodos_diputado'            => 'Number',
      'periodos_senador_desc'        => 'Text',
      'periodos_diputado_desc'       => 'Text',
      'primera_vez'                  => 'Text',
      'comisiones_anteriores'        => 'Text',
      'comisiones_actuales'          => 'Text',
      'voto_nro'                     => 'Number',
      'voto_porcentaje'              => 'Number',
      'gasto_electoral2005'          => 'Number',
      'financiamiento_electoral2005' => 'Number',
      'gasto_electoral2009'          => 'Number',
      'financiamiento_electoral2009' => 'Number',
      'comite_parlamentario'         => 'Text',
      'mail'                         => 'Text',
      'web'                          => 'Text',
      'twitter'                      => 'Text',
      'facebook'                     => 'Text',
      'dietas'                       => 'Number',
      'declaracion_interes'          => 'Text',
      'declaracion_patrimonio'       => 'Text',
      'educacion_universitaria'      => 'Text',
      'educacion_postgrado'          => 'Text',
      'cargos_gobierno'              => 'Text',
      'cargos_eleccion'              => 'Text',
      'experiencia_politica'         => 'Text',
      'experiencia_laboral'          => 'Text',
      'created_at'                   => 'Date',
      'updated_at'                   => 'Date',
    );
  }
}
