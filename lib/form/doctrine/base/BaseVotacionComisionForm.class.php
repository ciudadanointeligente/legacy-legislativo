<?php

/**
 * Votacion form base class.
 *
 * @method Votacion getObject() Returns the current form's model object
 *
 * @package    vota
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseVotacionComisionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_votacion'        => new sfWidgetFormInputHidden(),
      'id_proyecto_ley'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ProyectoLey'), 'add_empty' => true, 'order_by' => array('id_proyecto_ley', 'desc'))),
      'id_comision'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Comision'), 'add_empty' => true, 'order_by' => array('nombre', 'asc'))),
      'camara'             => new sfWidgetFormChoice(array(
                                'choices'  => Doctrine::getTable('VotacionComision')->getCamaras(),
                                'expanded' => true,
                              )),
      'tipo'               => new sfWidgetFormChoice(array(
                                'choices'  => Doctrine::getTable('VotacionComision')->getDiscusiones(),
                                'expanded' => true,
                              )),
      'articulo'           => new sfWidgetFormTextarea(),
      'voto_si'            => new sfWidgetFormInputText(),
      'voto_no'            => new sfWidgetFormInputText(),
      'voto_abs'           => new sfWidgetFormInputText(),
      'voto_disp'          => new sfWidgetFormInputText(),
      'voto_pareos'        => new sfWidgetFormInputText(),
      'voto_aus'           => new sfWidgetFormInputText(),
      'resultado'          => new sfWidgetFormChoice(array(
                                'choices'  => Doctrine::getTable('VotacionComision')->getResultados(),
                                'expanded' => true,
                              )),
      'quorum'             => new sfWidgetFormInputText(),
      'comentario'         => new sfWidgetFormTextarea(),
      'id_debate'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Debate'), 'add_empty' => true, 'order_by' => array('fecha', 'desc'), 'table_method' => 'getDebateComision')),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
      'parlamentario_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Parlamentario')),
    ));

    $this->setValidators(array(
      'id_votacion'        => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id_votacion', 'required' => false)),
      'id_proyecto_ley'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ProyectoLey'), 'required' => false)),
      'id_comision'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Comision'), 'required' => false)),
      'camara'             => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'tipo'               => new sfValidatorString(array('max_length' => 30)),
      'articulo'           => new sfValidatorString(array('max_length' => 2000, 'required' => false)),
      'voto_si'            => new sfValidatorInteger(),
      'voto_no'            => new sfValidatorInteger(),
      'voto_abs'           => new sfValidatorInteger(),
      'voto_disp'          => new sfValidatorInteger(array('required' => false)),
      'voto_pareos'        => new sfValidatorInteger(array('required' => false)),
      'voto_aus'           => new sfValidatorInteger(array('required' => false)),
      'resultado'          => new sfValidatorString(array('max_length' => 10)),
      'quorum'             => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'comentario'         => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'id_debate'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Debate'), 'required' => false)),
      'created_at'         => new sfValidatorDateTime(),
      'updated_at'         => new sfValidatorDateTime(),
      'parlamentario_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Parlamentario', 'required' => false)),
    ));
    
    $this->widgetSchema->setLabels(array(
      'id_comision'     => 'Comisión',
      'id_proyecto_ley' => 'Nro Boletín',
      'id_debate'       => 'Debate',
    ));
    
    $this->widgetSchema->setNameFormat('votacion_comision[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'VotacionComision';
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
