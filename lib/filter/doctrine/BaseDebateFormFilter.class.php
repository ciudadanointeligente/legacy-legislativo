<?php

/**
 * Debate filter form base class.
 *
 * @package    vota
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseDebateFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_debate'         => new sfWidgetFormInputHidden(),
      'id_proyecto_ley'   => new sfWidgetFormInputText(),
      'comision_sala'     => new sfWidgetFormChoice(array(
                                'choices'  => Doctrine::getTable('Debate')->getComisiones(),
                                'expanded' => true,
                              )),
      'camara'            => new sfWidgetFormChoice(array(
                                'choices'  => Doctrine::getTable('Debate')->getCamaras(),
                                'expanded' => true,
                              )),
      'fecha'             => new sfWidgetFormDate(array(
                              'format' => '%day% - %month% - %year%', 
                              'years' => array_combine(range(date('Y')-10, date('Y')), range(date('Y')-10, date('Y'))),
                          )),
      'discusion'         => new sfWidgetFormChoice(array(
                                'choices'  => Doctrine::getTable('Debate')->getDiscusiones(),
                                'expanded' => true,
                              )),
      'tema'              => new sfWidgetFormInputText(),
      'debate'            => new sfWidgetFormTextarea(),
      'tags'              => new sfWidgetFormInputText(),
      'docs'              => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id_debate'         => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id_debate', 'required' => false)),
      'id_proyecto_ley'   => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'comision_sala'     => new sfValidatorInteger(array('required' => false)),
      'camara'            => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'fecha'             => new sfValidatorDate(array('required' => false)),
      'discusion'         => new sfValidatorInteger(array('required' => false)),
      'tema'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'debate'            => new sfValidatorString(array('max_length' => 5000, 'required' => false)),
      'tags'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'docs'              => new sfValidatorString(array('max_length' => 5000, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Debate', 'column' => array('tema')))
    );

    $this->widgetSchema->setNameFormat('debate[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Debate';
  }

  public function getFields()
  {
    return array(
      'id_debate'       => 'Number',
      'id_proyecto_ley' => 'ForeignKey',
      'comision_sala'   => 'Number',
      'camara'          => 'Text',
      'fecha'           => 'Date',
      'discusion'       => 'Number',
      'tema'            => 'Text',
      'debate'          => 'Text',
      'tags'            => 'Text',
      'docs'            => 'Text',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
    );
  }
}
