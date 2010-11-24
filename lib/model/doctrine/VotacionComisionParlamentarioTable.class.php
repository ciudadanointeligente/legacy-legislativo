<?php

class VotacionComisionParlamentarioTable extends Doctrine_Table
{
  static public $votos = array(
    's' => 'si',
    'n' => 'no',
    'a' => 'abstención',
    'p' => 'pareos',
    'u' => 'ausente',
  );
  
  public function getVotos()
  {
    return self::$votos;
  }
}
