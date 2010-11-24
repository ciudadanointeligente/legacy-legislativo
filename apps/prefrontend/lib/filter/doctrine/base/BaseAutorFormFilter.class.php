<?php

/**
 * Autor filter form base class.
 *
 * @package    vota
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseAutorFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'apellidos'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cargo'            => new sfWidgetFormFilterInput(),
      'periodos'         => new sfWidgetFormFilterInput(),
      'id_parlamentario' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Parlamentario'), 'add_empty' => true)),
      'created_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'nombre'           => new sfValidatorPass(array('required' => false)),
      'apellidos'        => new sfValidatorPass(array('required' => false)),
      'cargo'            => new sfValidatorPass(array('required' => false)),
      'periodos'         => new sfValidatorPass(array('required' => false)),
      'id_parlamentario' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Parlamentario'), 'column' => 'id_parlamentario')),
      'created_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('autor_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Autor';
  }

  public function getFields()
  {
    return array(
      'id_autor'         => 'Number',
      'nombre'           => 'Text',
      'apellidos'        => 'Text',
      'cargo'            => 'Text',
      'periodos'         => 'Text',
      'id_parlamentario' => 'ForeignKey',
      'created_at'       => 'Date',
      'updated_at'       => 'Date',
    );
  }
}
