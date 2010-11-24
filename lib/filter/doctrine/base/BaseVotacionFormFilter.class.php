<?php

/**
 * Votacion filter form base class.
 *
 * @package    vota
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseVotacionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'tipo'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'articulo'           => new sfWidgetFormFilterInput(),
      'materia'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fecha'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'voto_si'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'voto_no'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'voto_abs'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'voto_pareos'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'voto_aus'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'resultado'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'quorum'             => new sfWidgetFormFilterInput(),
      'id_proyecto_ley'    => new sfWidgetFormFilterInput(),
      'id_sesion'          => new sfWidgetFormFilterInput(),
      'created_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'name'               => new sfValidatorPass(array('required' => false)),
      'tipo'               => new sfValidatorPass(array('required' => false)),
      'articulo'           => new sfValidatorPass(array('required' => false)),
      'materia'            => new sfValidatorPass(array('required' => false)),
      'fecha'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'voto_si'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'voto_no'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'voto_abs'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'voto_pareos'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'voto_aus'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'resultado'          => new sfValidatorPass(array('required' => false)),
      'quorum'             => new sfValidatorPass(array('required' => false)),
      'id_proyecto_ley'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_sesion'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('votacion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addParlamentarioListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query->leftJoin('r.VotacionParlamentario VotacionParlamentario')
          ->andWhereIn('VotacionParlamentario.id_parlamentario', $values);
  }

  public function getModelName()
  {
    return 'Votacion';
  }

  public function getFields()
  {
    return array(
      'name'               => 'Text',
      'id_votacion'        => 'Number',
      'tipo'               => 'Text',
      'articulo'           => 'Text',
      'materia'            => 'Text',
      'fecha'              => 'Date',
      'voto_si'            => 'Number',
      'voto_no'            => 'Number',
      'voto_abs'           => 'Number',
      'voto_pareos'        => 'Number',
      'voto_aus'           => 'Number',
      'resultado'          => 'Text',
      'quorum'             => 'Text',
      'id_proyecto_ley'    => 'Number',
      'id_sesion'          => 'Number',
      'id_debate'          => 'Number',
      'created_at'         => 'Date',
      'updated_at'         => 'Date',
    );
  }
}
