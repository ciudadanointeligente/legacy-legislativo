<?php

/**
 * Comuna form base class.
 *
 * @method Comuna getObject() Returns the current form's model object
 *
 * @package    vota
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseComunaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_comuna'   => new sfWidgetFormInputHidden(),
      'nombre'      => new sfWidgetFormInputText(),
      'id_distrito' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Distrito'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id_comuna'   => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id_comuna', 'required' => false)),
      'nombre'      => new sfValidatorString(array('max_length' => 255)),
      'id_distrito' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Distrito'))),
    ));

    $this->widgetSchema->setNameFormat('comuna[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Comuna';
  }

}
