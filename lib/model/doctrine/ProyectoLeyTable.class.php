<?php

class ProyectoLeyTable extends Doctrine_Table
{
  static public $iniciativa = array(
    'Moción' => 'Moción',
    'Mensaje' => 'Mensaje',
  );
  static public $tipo = array(
    'Proyecto de ley' => 'Proyecto de ley',
    'Proyecto de acuerdo' => 'Proyecto de acuerdo',
    'Reforma constitucional' => 'Reforma constitucional',
  );
  static public $camara = array(
    'C.Diputados' => 'C.Diputados',
    'Senado' => 'Senado',
  );
  static public $urgencia = array(
    'Sin urgencia' => 'Sin urgencia',
    'Simple' => 'Simple',
    'Suma' => 'Suma',
    'Discusión inmediata' => 'Discusión inmediata',
  );
  static public $tramitacion = array(
    'Si' => 'Si',
    'No' => 'No',
  );

  public function getIniciativas()
  {
    return self::$iniciativa;
  }
  public function getTipos()
  {
    return self::$tipo;
  }
  public function getCamaras()
  {
    return self::$camara;
  }
  public function getUrgencias()
  {
    return self::$urgencia;
  }
  public function getTramitaciones()
  {
    return self::$tramitacion;
  }
  
  public function countProyectos(Doctrine_Query $q = null)
  {
    if (is_null($q))
    {
      $q = Doctrine_Query::create()
        ->from('ProyectoLey p');
    }
 
    return $q->count();
  }
}
