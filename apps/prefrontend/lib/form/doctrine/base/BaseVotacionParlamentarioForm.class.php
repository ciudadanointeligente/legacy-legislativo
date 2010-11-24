<?php

/**
 * VotacionParlamentario form base class.
 *
 * @method VotacionParlamentario getObject() Returns the current form's model object
 *
 * @package    vota
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseVotacionParlamentarioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_votacion'      => new sfWidgetFormInputHidden(),
      'id_parlamentario' => new sfWidgetFormInputHidden(),
      'voto'             => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id_votacion'      => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id_votacion', 'required' => false)),
      'id_parlamentario' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id_parlamentario', 'required' => false)),
      'voto'             => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('votacion_parlamentario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'VotacionParlamentario';
  }

}
