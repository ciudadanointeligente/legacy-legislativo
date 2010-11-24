<?php

/**
 * Region filter form base class.
 *
 * @package    vota
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseRegionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'sigla'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nombre'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'sigla'     => new sfValidatorPass(array('required' => false)),
      'nombre'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('region_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Region';
  }

  public function getFields()
  {
    return array(
      'id_region' => 'Number',
      'sigla'     => 'Text',
      'nombre'    => 'Text',
    );
  }
}
