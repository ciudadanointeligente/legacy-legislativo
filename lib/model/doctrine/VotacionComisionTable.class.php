<?php

class VotacionComisionTable extends Doctrine_Table
{
  static public $discusion = array(
    'particular' => 'particular',
    'general' => 'general',
    'ambas' => 'ambas',
    'única' => 'única',
  );
  static public $resultados = array(
    'Aprobado' => 'Aprobado',
    'Rechazado' => 'Rechazado',
  );
  static public $camara = array(
    'C.Diputados' => 'C.Diputados',
    'Senado' => 'Senado',
  );
  
  public function getDiscusiones()
  {
    return self::$discusion;
  }
  public function getResultados()
  {
    return self::$resultados;
  }
  public function getCamaras()
  {
    return self::$camara;
  }
}
