<?php

/**
 * ProyectoLeyRefundido form base class.
 *
 * @method ProyectoLeyRefundido getObject() Returns the current form's model object
 *
 * @package    vota
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseProyectoLeyRefundidoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_proyecto_ley'  => new sfWidgetFormInputHidden(),
      'id_proyecto_ley2' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id_proyecto_ley'  => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id_proyecto_ley', 'required' => false)),
      'id_proyecto_ley2' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id_proyecto_ley2', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('proyecto_ley_refundido[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProyectoLeyRefundido';
  }

}
