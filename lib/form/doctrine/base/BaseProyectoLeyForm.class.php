<?php

/**
 * ProyectoLey form base class.
 *
 * @method ProyectoLey getObject() Returns the current form's model object
 *
 * @package    vota
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseProyectoLeyForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_proyecto_ley'   => new sfWidgetFormInputHidden(),
      'nro_boletin'       => new sfWidgetFormInputText(),
      'titulo'            => new sfWidgetFormTextarea(),
      'titulo_sesion'     => new sfWidgetFormTextarea(),
      'fecha_ingreso'     => new sfWidgetFormDate(array(
                              'format' => '%day% - %month% - %year%', 
                              'years' => array_combine(range('1990', date('Y')), range('1990', date('Y'))),
                          )),
      'iniciativa'        => new sfWidgetFormChoice(array(
                                'choices'  => Doctrine::getTable('ProyectoLey')->getIniciativas(),
                                'expanded' => true,
                              )),
      'tipo'              => new sfWidgetFormChoice(array(
                                'choices'  => Doctrine::getTable('ProyectoLey')->getTipos(),
                                'expanded' => true,
                              )),
      'camara_origen'     => new sfWidgetFormChoice(array(
                                'choices'  => Doctrine::getTable('ProyectoLey')->getCamaras(),
                                'expanded' => true,
                              )),
      'urgencia'          => new sfWidgetFormChoice(array(
                                'choices'  => Doctrine::getTable('ProyectoLey')->getUrgencias(),
                                'expanded' => true,
                              )),
      'etapa'             => new sfWidgetFormInputText(),
      'sub_etapa'         => new sfWidgetFormInputText(),
      'ley'               => new sfWidgetFormInputText(),
      'ley_bcn'           => new sfWidgetFormInputText(),
      'decreto'           => new sfWidgetFormInputText(),
      'decreto_bcn'       => new sfWidgetFormInputText(),
      'fecha_publicacion' => new sfWidgetFormDate(array(
                              'format' => '%day% - %month% - %year%', 
                              'years' => array_combine(range('1990', date('Y')), range('1990', date('Y'))),
                              'empty_values' => array('year' => '', 'month' => '', 'day' => ''),
                          )),
      'id_materia'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Materia'), 'add_empty' => true)),
      'nro_interno'       => new sfWidgetFormInputText(),
      'avance'            => new sfWidgetFormInputText(),
      'nro_tramitacion'   => new sfWidgetFormInputText(),
      'tramitacion_act'   => new sfWidgetFormChoice(array(
                                'choices'  => Doctrine::getTable('ProyectoLey')->getTramitaciones(),
                                'expanded' => true,
                              )),
      'resumen'           => new sfWidgetFormTextarea(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id_proyecto_ley'   => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id_proyecto_ley', 'required' => false)),
      'nro_boletin'       => new sfValidatorString(array('max_length' => 10)),
      'titulo'            => new sfValidatorString(array('max_length' => 500)),
      'titulo_sesion'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'fecha_ingreso'     => new sfValidatorDate(),
      'iniciativa'        => new sfValidatorString(array('max_length' => 30)),
      'tipo'              => new sfValidatorString(array('max_length' => 30)),
      'camara_origen'     => new sfValidatorString(array('max_length' => 30)),
      'urgencia'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'etapa'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'sub_etapa'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'ley'               => new sfValidatorInteger(array('required' => false)),
      'ley_bcn'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'decreto'           => new sfValidatorInteger(array('required' => false)),
      'decreto_bcn'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'fecha_publicacion' => new sfValidatorDate(array('required' => false)),
      'id_materia'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Materia'), 'required' => false)),
      'nro_interno'       => new sfValidatorInteger(array('required' => false)),
      'avance'            => new sfValidatorInteger(array('required' => false)),
      'nro_tramitacion'   => new sfValidatorInteger(array('required' => false)),
      'tramitacion_act'   => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'resumen'           => new sfValidatorString(array('max_length' => 5000, 'required' => false)),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'ProyectoLey', 'column' => array('nro_boletin')))
    );

    $this->widgetSchema->setNameFormat('proyecto_ley[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProyectoLey';
  }

}
