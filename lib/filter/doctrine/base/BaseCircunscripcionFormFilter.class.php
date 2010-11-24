<?php

/**
 * Circunscripcion filter form base class.
 *
 * @package    vota
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseCircunscripcionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'nombre'             => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('circunscripcion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Circunscripcion';
  }

  public function getFields()
  {
    return array(
      'id_circunscripcion' => 'Number',
      'nombre'             => 'Text',
    );
  }
}
