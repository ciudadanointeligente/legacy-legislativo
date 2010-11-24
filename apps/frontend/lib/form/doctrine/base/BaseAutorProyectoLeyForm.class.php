<?php

/**
 * AutorProyectoLey form base class.
 *
 * @method AutorProyectoLey getObject() Returns the current form's model object
 *
 * @package    vota
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseAutorProyectoLeyForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_autor'        => new sfWidgetFormInputHidden(),
      'id_proyecto_ley' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id_autor'        => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id_autor', 'required' => false)),
      'id_proyecto_ley' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id_proyecto_ley', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('autor_proyecto_ley[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AutorProyectoLey';
  }

}
