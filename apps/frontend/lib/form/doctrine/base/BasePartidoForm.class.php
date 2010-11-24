<?php

/**
 * Partido form base class.
 *
 * @method Partido getObject() Returns the current form's model object
 *
 * @package    vota
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasePartidoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_partido'         => new sfWidgetFormInputHidden(),
      'nombre'             => new sfWidgetFormInputText(),
      'sigla'              => new sfWidgetFormInputText(),
      'fecha_nacimiento'   => new sfWidgetFormInputText(),
      'mesa_adulta'        => new sfWidgetFormTextarea(),
      'mesa_juventud'      => new sfWidgetFormTextarea(),
      'nro_diputados_2010' => new sfWidgetFormInputText(),
      'nro_senadores_2010' => new sfWidgetFormInputText(),
      'direccion'          => new sfWidgetFormInputText(),
      'telefono'           => new sfWidgetFormInputText(),
      'mail'               => new sfWidgetFormInputText(),
      'web'                => new sfWidgetFormInputText(),
      'historia'           => new sfWidgetFormTextarea(),
      'principios'         => new sfWidgetFormInputText(),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id_partido'         => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id_partido', 'required' => false)),
      'nombre'             => new sfValidatorString(array('max_length' => 255)),
      'sigla'              => new sfValidatorString(array('max_length' => 10)),
      'fecha_nacimiento'   => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'mesa_adulta'        => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'mesa_juventud'      => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'nro_diputados_2010' => new sfValidatorInteger(),
      'nro_senadores_2010' => new sfValidatorInteger(),
      'direccion'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'telefono'           => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'mail'               => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'web'                => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'historia'           => new sfValidatorString(array('max_length' => 5000, 'required' => false)),
      'principios'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'         => new sfValidatorDateTime(),
      'updated_at'         => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('partido[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Partido';
  }

}
