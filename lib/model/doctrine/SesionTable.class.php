<?php

class SesionTable extends Doctrine_Table
{
  static public $camara = array(
    'C.Diputados' => 'C.Diputados',
    'Senado' => 'Senado',
  );

  public function getCamaras()
  {
    return self::$camara;
  }
}
