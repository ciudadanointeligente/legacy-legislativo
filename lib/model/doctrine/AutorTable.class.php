<?php

class AutorTable extends Doctrine_Table
{
  static public $cargo = array(
    'Diputado' => 'Diputado',
    'Senador' => 'Senador',
  );

  public function getCargo()
  {
    return self::$cargo;
  }

}
