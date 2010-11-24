<?php

/**
 * AutorProyectoLey filter form base class.
 *
 * @package    vota
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseAutorProyectoLeyFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
    ));

    $this->setValidators(array(
    ));

    $this->widgetSchema->setNameFormat('autor_proyecto_ley_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AutorProyectoLey';
  }

  public function getFields()
  {
    return array(
      'id_autor'        => 'Number',
      'id_proyecto_ley' => 'Number',
    );
  }
}
