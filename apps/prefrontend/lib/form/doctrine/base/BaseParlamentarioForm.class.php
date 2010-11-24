<?php

/**
 * Parlamentario form base class.
 *
 * @method Parlamentario getObject() Returns the current form's model object
 *
 * @package    vota
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseParlamentarioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_parlamentario'             => new sfWidgetFormInputHidden(),
      'nombre'                       => new sfWidgetFormInputText(),
      'apellidos'                    => new sfWidgetFormInputText(),
      'senador_diputado'             => new sfWidgetFormChoice(array(
                                          'choices'  => Doctrine::getTable('Parlamentario')->getCamaras(),
                                          'expanded' => true,
                                        )),
      'id_circunscripcion'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Circunscripcion'), 'add_empty' => true)),
      'id_distrito'                  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Distrito'), 'add_empty' => true)),
      'pacto'                        => new sfWidgetFormInputText(),
      'id_partido'                   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Partido'), 'add_empty' => false)),
      'sexo'                         => new sfWidgetFormChoice(array(
                                          'choices'  => Doctrine::getTable('Parlamentario')->getSexo(),
                                          'expanded' => true,
                                        )),
      'fecha_nacimiento'             => new sfWidgetFormDate(array(
                                          'format' => '%day% - %month% - %year%', 
                                          'years' => array_combine(range(date('Y')-105, date('Y')-20), range(date('Y')-105, date('Y')-20)),
                                      )),
      'profesion'                    => new sfWidgetFormInputText(),
      'mesa_directiva'               => new sfWidgetFormInputText(),
      'periodos_senador'             => new sfWidgetFormInputText(),
      'periodos_diputado'            => new sfWidgetFormInputText(),
      'periodos_senador_desc'        => new sfWidgetFormInputText(),
      'periodos_diputado_desc'       => new sfWidgetFormInputText(),
      'primera_vez'                  => new sfWidgetFormChoice(array(
                                          'choices'  => Doctrine::getTable('Parlamentario')->getPrimer(),
                                          'expanded' => true,
                                        )),
      'comisiones_anteriores'        => new sfWidgetFormTextarea(),
      'comisiones_actuales'          => new sfWidgetFormTextarea(),
      'voto_nro'                     => new sfWidgetFormInputText(),
      'voto_porcentaje'              => new sfWidgetFormInputText(),
      'gasto_electoral2005'          => new sfWidgetFormInputText(),
      'financiamiento_electoral2005' => new sfWidgetFormInputText(),
      'gasto_electoral2009'          => new sfWidgetFormInputText(),
      'financiamiento_electoral2009' => new sfWidgetFormInputText(),
      'comite_parlamentario'         => new sfWidgetFormTextarea(),
      'mail'                         => new sfWidgetFormInputText(),
      'web'                          => new sfWidgetFormInputText(),
      'twitter'                      => new sfWidgetFormInputText(),
      'facebook'                     => new sfWidgetFormInputText(),
      'dietas'                       => new sfWidgetFormInputText(),
      'declaracion_interes'          => new sfWidgetFormTextarea(),
      'declaracion_patrimonio'       => new sfWidgetFormTextarea(),
      'educacion_universitaria'      => new sfWidgetFormInputText(),
      'educacion_postgrado'          => new sfWidgetFormInputText(),
      'cargos_gobierno'              => new sfWidgetFormInputText(),
      'cargos_eleccion'              => new sfWidgetFormTextarea(),
      'experiencia_politica'         => new sfWidgetFormTextarea(),
      'experiencia_laboral'          => new sfWidgetFormTextarea(),
      'id_parlamento'                => new sfWidgetFormInputText(),
      'activo'                       => new sfWidgetFormChoice(array(
                                          'choices'  => Doctrine::getTable('Parlamentario')->getActivo(),
                                          'expanded' => true,
                                        )),
      'created_at'                   => new sfWidgetFormDateTime(),
      'updated_at'                   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id_parlamentario'             => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id_parlamentario', 'required' => false)),
      'nombre'                       => new sfValidatorString(array('max_length' => 100)),
      'apellidos'                    => new sfValidatorString(array('max_length' => 100)),
      'senador_diputado'             => new sfValidatorString(array('max_length' => 10)),
      'id_circunscripcion'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Circunscripcion'), 'required' => false)),
      'id_distrito'                  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Distrito'), 'required' => false)),
      'pacto'                        => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'id_partido'                   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Partido'))),
      'sexo'                         => new sfValidatorString(array('max_length' => 1)),
      'fecha_nacimiento'             => new sfValidatorDate(array('required' => false)),
      'profesion'                    => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'mesa_directiva'               => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'periodos_senador'             => new sfValidatorInteger(array('required' => false)),
      'periodos_diputado'            => new sfValidatorInteger(array('required' => false)),
      'periodos_senador_desc'        => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'periodos_diputado_desc'       => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'primera_vez'                  => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'comisiones_anteriores'        => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'comisiones_actuales'          => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'voto_nro'                     => new sfValidatorInteger(array('required' => false)),
      'voto_porcentaje'              => new sfValidatorNumber(array('required' => false)),
      'gasto_electoral2005'          => new sfValidatorInteger(array('required' => false)),
      'financiamiento_electoral2005' => new sfValidatorInteger(array('required' => false)),
      'gasto_electoral2009'          => new sfValidatorInteger(array('required' => false)),
      'financiamiento_electoral2009' => new sfValidatorInteger(array('required' => false)),
      'comite_parlamentario'         => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'mail'                         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'web'                          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'twitter'                      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'facebook'                     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'dietas'                       => new sfValidatorInteger(array('required' => false)),
      'declaracion_interes'          => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'declaracion_patrimonio'       => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'educacion_universitaria'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'educacion_postgrado'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cargos_gobierno'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cargos_eleccion'              => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'experiencia_politica'         => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'experiencia_laboral'          => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'id_parlamento'                => new sfValidatorInteger(array('required' => false)),
      'activo'                       => new sfValidatorString(array('max_length' => 1)),
      'created_at'                   => new sfValidatorDateTime(),
      'updated_at'                   => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('parlamentario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Parlamentario';
  }

}
