<?php

/**
 * Distrito form base class.
 *
 * @method Distrito getObject() Returns the current form's model object
 *
 * @package    vota
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseDistritoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_distrito'        => new sfWidgetFormInputHidden(),
      'id_circunscripcion' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Circunscripcion'), 'add_empty' => false)),
      'id_region'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Region'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id_distrito'        => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id_distrito', 'required' => false)),
      'id_circunscripcion' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Circunscripcion'))),
      'id_region'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Region'))),
    ));

    $this->widgetSchema->setNameFormat('distrito[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Distrito';
  }

}
