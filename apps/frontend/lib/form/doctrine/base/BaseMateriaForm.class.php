<?php

/**
 * Materia form base class.
 *
 * @method Materia getObject() Returns the current form's model object
 *
 * @package    vota
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseMateriaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_materia'    => new sfWidgetFormInputHidden(),
      'nombre'        => new sfWidgetFormInputText(),
      'super_materia' => new sfWidgetFormInputText(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id_materia'    => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id_materia', 'required' => false)),
      'nombre'        => new sfValidatorString(array('max_length' => 255)),
      'super_materia' => new sfValidatorString(array('max_length' => 255)),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Materia', 'column' => array('nombre')))
    );

    $this->widgetSchema->setNameFormat('materia[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Materia';
  }

}
