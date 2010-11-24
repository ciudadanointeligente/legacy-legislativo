<?php

/**
 * Sesion form base class.
 *
 * @method Sesion getObject() Returns the current form's model object
 *
 * @package    vota
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSesionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_sesion'         => new sfWidgetFormInputHidden(),
      'fecha'              => new sfWidgetFormDate(array(
                              'format' => '%day% - %month% - %year%', 
                              'years' => array_combine(range(date('Y')-10, date('Y')), range(date('Y')-10, date('Y'))),
                          )),
      'camara'            => new sfWidgetFormChoice(array(
                                'choices'  => Doctrine::getTable('Debate')->getCamaras(),
                                'expanded' => true,
                              )),
      'nro'               => new sfWidgetFormInputText(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
      'proyecto_ley_list' => new sfWidgetFormDoctrineChoice(array(
                                'multiple' => true, 
                                'model' => 'ProyectoLey', 
                                'order_by' => array('nro_boletin', 'desc'),
                                'renderer_class' => 'sfWidgetFormSelectDoubleList',
                                'renderer_options' => array('label_associated' => 'Boletines de la sesión', 'label_unassociated' => 'Todos los boletines'),
                              )),
    ));

    $this->setValidators(array(
      'id_sesion'         => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id_sesion', 'required' => false)),
      'fecha'             => new sfValidatorDate(),
      'camara'            => new sfValidatorString(array('max_length' => 30)),
      'nro'               => new sfValidatorInteger(array('required' => false)),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(),
      'proyecto_ley_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'ProyectoLey', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sesion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Sesion';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['proyecto_ley_list']))
    {
      $this->setDefault('proyecto_ley_list', $this->object->ProyectoLey->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveProyectoLeyList($con);

    parent::doSave($con);
  }

  public function saveProyectoLeyList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['proyecto_ley_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->ProyectoLey->getPrimaryKeys();
    $values = $this->getValue('proyecto_ley_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('ProyectoLey', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('ProyectoLey', array_values($link));
    }
  }

}
