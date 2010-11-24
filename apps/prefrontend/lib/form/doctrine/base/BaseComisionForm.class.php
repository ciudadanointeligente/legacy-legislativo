<?php

/**
 * Comision form base class.
 *
 * @method Comision getObject() Returns the current form's model object
 *
 * @package    vota
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseComisionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_comision' => new sfWidgetFormInputHidden(),
      'nombre'      => new sfWidgetFormInputText(),
      'tipo'        => new sfWidgetFormChoice(array(
                        'choices'  => Doctrine::getTable('Comision')->getTipos(),
                        'expanded' => true,
                      )),
      'camara'      => new sfWidgetFormChoice(array(
                        'choices'  => Doctrine::getTable('Comision')->getCamaras(),
                        'expanded' => true,
                      )),
      'contacto_mail'      => new sfWidgetFormInputText(),
      'contacto_tel'      => new sfWidgetFormInputText(),
      'contacto_form'      => new sfWidgetFormInputText(),
      'abogado_secretario'      => new sfWidgetFormInputText(),
      'abogado_ayudante'      => new sfWidgetFormInputText(),
      'secretario_ejecutivo'      => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
      'parlamentario_list' => new sfWidgetFormDoctrineChoice(array(
                                'multiple' => true, 
                                'model' => 'Parlamentario', 
                                'order_by' => array('nombre', 'asc'),
                                'renderer_class' => 'sfWidgetFormSelectDoubleList',
                                'renderer_options' => array('label_associated' => 'Parlamentarios de la comisión', 'label_unassociated' => 'Todos los parlamentarios'),
                                'table_method' => 'getParlamentariosActivos',
                              )),
    ));

    $this->setValidators(array(
      'id_comision' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id_comision', 'required' => false)),
      'nombre'      => new sfValidatorString(array('max_length' => 255)),
      'tipo'        => new sfValidatorString(array('max_length' => 100)),
      'camara'      => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'contacto_mail'      => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'contacto_tel'      => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'contacto_form'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'abogado_secretario'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'abogado_ayudante'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'secretario_ejecutivo'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
      'parlamentario_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Parlamentario', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Comision', 'column' => array('nombre')))
    );

    $this->widgetSchema->setNameFormat('comision[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Comision';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['parlamentario_list']))
    {
      $this->setDefault('parlamentario_list', $this->object->Parlamentario->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveParlamentarioList($con);

    parent::doSave($con);
  }

  public function saveParlamentarioList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['parlamentario_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Parlamentario->getPrimaryKeys();
    $values = $this->getValue('parlamentario_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Parlamentario', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Parlamentario', array_values($link));
    }
  }

}
