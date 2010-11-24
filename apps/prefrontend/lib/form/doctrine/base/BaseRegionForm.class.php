<?php

/**
 * Region form base class.
 *
 * @method Region getObject() Returns the current form's model object
 *
 * @package    vota
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseRegionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_region' => new sfWidgetFormInputHidden(),
      'sigla'     => new sfWidgetFormInputText(),
      'nombre'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_region' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id_region', 'required' => false)),
      'sigla'     => new sfValidatorString(array('max_length' => 4)),
      'nombre'    => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'Region', 'column' => array('sigla'))),
        new sfValidatorDoctrineUnique(array('model' => 'Region', 'column' => array('nombre'))),
      ))
    );

    $this->widgetSchema->setNameFormat('region[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Region';
  }

}
