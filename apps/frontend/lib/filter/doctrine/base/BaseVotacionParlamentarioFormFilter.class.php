<?php

/**
 * VotacionParlamentario filter form base class.
 *
 * @package    vota
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseVotacionParlamentarioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'voto'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'voto'             => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('votacion_parlamentario_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'VotacionParlamentario';
  }

  public function getFields()
  {
    return array(
      'id_votacion'      => 'Number',
      'id_parlamentario' => 'Number',
      'voto'             => 'Text',
    );
  }
}
