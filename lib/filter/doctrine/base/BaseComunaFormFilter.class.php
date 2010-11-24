<?php

/**
 * Comuna filter form base class.
 *
 * @package    vota
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseComunaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_distrito' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Distrito'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'nombre'      => new sfValidatorPass(array('required' => false)),
      'id_distrito' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Distrito'), 'column' => 'id_distrito')),
    ));

    $this->widgetSchema->setNameFormat('comuna_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Comuna';
  }

  public function getFields()
  {
    return array(
      'id_comuna'   => 'Number',
      'nombre'      => 'Text',
      'id_distrito' => 'ForeignKey',
    );
  }
}
