<?php

/**
 * VotacionParlamentario form base class.
 *
 * @method VotacionParlamentario getObject() Returns the current form's model object
 *
 * @package    vota
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseVotacionComisionParlamentarioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_votacion'      => new sfWidgetFormInputHidden(),
      'id_parlamentario' => new sfWidgetFormDoctrineChoice(array('model' => 'Parlamentario', 'add_empty' => true, 'order_by' => array('nombre', 'asc'), 'table_method' => 'getParlamentariosEnComision')),
      'voto'             => new sfWidgetFormChoice(array(
                                'choices'  => Doctrine::getTable('VotacionComisionParlamentario')->getVotos(),
                                'expanded' => true,
                              )),
    ));

    $this->setValidators(array(
      'id_votacion'      => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id_votacion', 'required' => false)),
      'id_parlamentario' => new sfValidatorDoctrineChoice(array('model' => 'Parlamentario', 'required' => false)),
      'voto'             => new sfValidatorString(array('max_length' => 1, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('votacion_comision_parlamentario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'VotacionComisionParlamentario';
  }
}
