<?php

class ParlamentarioTable extends Doctrine_Table
{
  static public $camara = array(
    'D' => 'Diputado',
    'S' => 'Senador',
  );
  static public $sexo = array(
    'M' => 'Masculino',
    'F' => 'Feminino',
  );
  static public $primer = array(
    'Si' => 'Si',
    'No' => 'No',
  );
  static public $activo = array(
    '1' => 'Si',
    '0' => 'No',
  );
  
  public function getCamaras()
  {
    return self::$camara;
  }
  public function getSexo()
  {
    return self::$sexo;
  }
  public function getPrimer()
  {
    return self::$primer;
  }
  public function getActivo()
  {
    return self::$activo;
  }

  public function getParlamentariosEnComision()
  {
    return Doctrine_Core::getTable('Parlamentario')->createQuery('p')->orderby('p.nombre asc')->execute();
  }
  
  public function getParlamentariosActivos()
  {
    return Doctrine_Core::getTable('Parlamentario')->createQuery('p')->where('p.activo = ?', 1)->execute();
  }
}
