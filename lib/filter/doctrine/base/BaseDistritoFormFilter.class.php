<?php

/**
 * Distrito filter form base class.
 *
 * @package    vota
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseDistritoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_circunscripcion' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Circunscripcion'), 'add_empty' => true)),
      'id_region'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Region'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_circunscripcion' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Circunscripcion'), 'column' => 'id_circunscripcion')),
      'id_region'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Region'), 'column' => 'id_region')),
    ));

    $this->widgetSchema->setNameFormat('distrito_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Distrito';
  }

  public function getFields()
  {
    return array(
      'id_distrito'        => 'Number',
      'id_circunscripcion' => 'ForeignKey',
      'id_region'          => 'ForeignKey',
    );
  }
}
