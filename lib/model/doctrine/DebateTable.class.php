<?php

class DebateTable extends Doctrine_Table
{
  static public $comision = array(
    '1' => 'Comsión',
    '0' => 'Sala',
  );
  static public $unidas = array(
    '0' => 'No',
    '1' => 'Si',
  );
  static public $camara = array(
    'C.Diputados' => 'C.Diputados',
    'Senado' => 'Senado',
  );
  static public $discusion = array(
    '0' => 'particular',
    '1' => 'general',
    '2' => 'ambas',
    '3' => 'única',
  );
 
  public function getComisiones()
  {
    return self::$comision;
  }

  public function getUnidas()
  {
    return self::$unidas;
  }

  public function getCamaras()
  {
    return self::$camara;
  }

  public function getDiscusiones()
  {
    return self::$discusion;
  }

  public function getDebateComision()
  {
    return Doctrine_Core::getTable('Debate')->createQuery('d')->where('d.comision_sala = ?', 1)->execute();
  }
}
