<?php

/**
 * DebateComision form base class.
 *
 * @method DebateComision getObject() Returns the current form's model object
 *
 * @package    vota
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseDebateComisionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_debate'   => new sfWidgetFormInputHidden(),
      'id_comision' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id_debate'   => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id_debate', 'required' => false)),
      'id_comision' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id_comision', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('debate_comision[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DebateComision';
  }

}
