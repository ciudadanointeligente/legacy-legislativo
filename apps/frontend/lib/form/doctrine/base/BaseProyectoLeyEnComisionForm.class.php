<?php

/**
 * ProyectoLeyEnComision form base class.
 *
 * @method ProyectoLeyEnComision getObject() Returns the current form's model object
 *
 * @package    vota
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseProyectoLeyEnComisionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_proyecto_ley' => new sfWidgetFormInputHidden(),
      'id_comision'     => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id_proyecto_ley' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id_proyecto_ley', 'required' => false)),
      'id_comision'     => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id_comision', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('proyecto_ley_en_comision[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProyectoLeyEnComision';
  }

}
