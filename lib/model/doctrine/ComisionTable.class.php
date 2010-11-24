<?php

class ComisionTable extends Doctrine_Table
{
  static public $tipo = array(
    'permanente' => 'permenente',
    'especial' => 'especial',
  );
  static public $camara = array(
    'C.Diputados' => 'C.Diputados',
    'Senado' => 'Senado',
  );
 
  public function getTipos()
  {
    return self::$tipo;
  }

  public function getCamaras()
  {
    return self::$camara;
  }
}
