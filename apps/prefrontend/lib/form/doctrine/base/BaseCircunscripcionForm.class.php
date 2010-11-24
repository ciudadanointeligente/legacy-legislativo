<?php

/**
 * Circunscripcion form base class.
 *
 * @method Circunscripcion getObject() Returns the current form's model object
 *
 * @package    vota
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseCircunscripcionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_circunscripcion' => new sfWidgetFormInputHidden(),
      'nombre'             => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_circunscripcion' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id_circunscripcion', 'required' => false)),
      'nombre'             => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Circunscripcion', 'column' => array('nombre')))
    );

    $this->widgetSchema->setNameFormat('circunscripcion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Circunscripcion';
  }

}
