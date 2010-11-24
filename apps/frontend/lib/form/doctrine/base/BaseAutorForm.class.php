<?php

/**
 * Autor form base class.
 *
 * @method Autor getObject() Returns the current form's model object
 *
 * @package    vota
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseAutorForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_autor'         => new sfWidgetFormInputHidden(),
      'nombre'           => new sfWidgetFormInputText(),
      'apellidos'        => new sfWidgetFormInputText(),
      'cargo'            => new sfWidgetFormChoice(array(
                                'choices'  => Doctrine::getTable('Autor')->getCargo(),
                                'expanded' => true,
                              )),
      'periodos'         => new sfWidgetFormInputText(),
      'id_parlamentario' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Parlamentario'), 'add_empty' => true)),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id_autor'         => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id_autor', 'required' => false)),
      'nombre'           => new sfValidatorString(array('max_length' => 100)),
      'apellidos'        => new sfValidatorString(array('max_length' => 100)),
      'cargo'            => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'periodos'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'id_parlamentario' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Parlamentario'), 'required' => false)),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setLabels(array(
      'id_parlamentario' => 'Parlamentario',
    ));
    
    $this->widgetSchema['id_parlamentario']->addOption('order_by',array('nombre','asc'));
    
    $this->widgetSchema->setNameFormat('autor[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Autor';
  }

}
