<?php

/**
 * Debate form base class.
 *
 * @method Debate getObject() Returns the current form's model object
 *
 * @package    vota
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseDebateForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_debate'         => new sfWidgetFormInputHidden(),
      'id_proyecto_ley'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ProyectoLey'), 'add_empty' => false, 'order_by' => array('id_proyecto_ley', 'desc'))),
      'comision_sala'     => new sfWidgetFormChoice(array(
                                'choices'  => Doctrine::getTable('Debate')->getComisiones(),
                                'expanded' => true,
                              )),
      'camara'            => new sfWidgetFormChoice(array(
                                'choices'  => Doctrine::getTable('Debate')->getCamaras(),
                                'expanded' => true,
                              )),
      'comision_list'     => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Comision', 'order_by' => array('nombre', 'asc'))),
      'comisiones_unidas' => new sfWidgetFormChoice(array(
                                'choices'  => Doctrine::getTable('Debate')->getUnidas(),
                                'multiple' => false,
                                'expanded' => true,
                              )),
      'fecha'             => new sfWidgetFormDate(array(
                              'format' => '%day% - %month% - %year%', 
                              'years' => array_combine(range(date('Y')-10, date('Y')), range(date('Y')-10, date('Y'))),
                          )),
      /*'fecha'             => new sfWidgetFormDateTime(array(
                            'default' => '03/11/2010 12:00',
                            'date' => array('format' => '%day% - %month% - %year%','years' => array_combine(range(date('Y')-10, date('Y')), range(date('Y')-10, date('Y'))),), 
                            )),*/
      'hora'              => new sfWidgetFormTime(),
      'discusion'         => new sfWidgetFormChoice(array(
                                'choices'  => Doctrine::getTable('Debate')->getDiscusiones(),
                                'expanded' => true,
                              )),
      'tema'              => new sfWidgetFormInputText(),
      'debate'            => new sfWidgetFormTextarea(),
      'tags'              => new sfWidgetFormInputText(),
      'docs'              => new sfWidgetFormTextarea(),
      'destacado_titulo'  => new sfWidgetFormInputText(),
      'destacado_texto'   => new sfWidgetFormTextarea(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id_debate'         => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id_debate', 'required' => false)),
      'id_proyecto_ley'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ProyectoLey'))),
      'comision_sala'     => new sfValidatorInteger(array('required' => false)),
      'camara'            => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'comision_list'     => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Comision', 'required' => false)),
      'comisiones_unidas' => new sfValidatorInteger(array('required' => false)),
      'fecha'             => new sfValidatorDate(array('required' => false)),
      'hora'              => new sfValidatorTime(array('required' => false)),
      'discusion'         => new sfValidatorInteger(array('required' => false)),
      'tema'              => new sfValidatorString(array('max_length' => 255)),
      'debate'            => new sfValidatorString(array('max_length' => 5000, 'required' => false)),
      'tags'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'docs'              => new sfValidatorString(array('max_length' => 5000, 'required' => false)),
      'destacado_titulo'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'destacado_texto'   => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(),
    ));

    //$this->widgetSchema->setHelp('comision', 'Marque la casilla si es Debate en Comisión, dejalo sin marquar si es en Sala.');
    
    $this->widgetSchema->setLabels(array(
      'comision_sala' => 'Debate en Comisión o Sala?',
      'tags'          => 'Tags separados por coma',
      'docs'          => 'Enlaces a documentos separados por coma',
      'comision_list' => 'Comisiones',
    ));

    $this->widgetSchema->setNameFormat('debate[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Debate';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['comision_list']))
    {
      $this->setDefault('comision_list', $this->object->Comision->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveComisionList($con);

    parent::doSave($con);
  }

  public function saveComisionList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['comision_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Comision->getPrimaryKeys();
    $values = $this->getValue('comision_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Comision', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Comision', array_values($link));
    }
  }

}
