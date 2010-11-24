<?php 
  if ($content == 'index' || $content == 'perfiles'){
    
    //pasa el último debate destacado    
    $debates = Doctrine::getTable('Debate')
    ->createQuery('d')
    ->where('d.destacado_titulo IS NOT NULL AND d.destacado_texto IS NOT NULL')
    ->orderBy('d.fecha DESC')
    ->limit(1)
    ->execute();
  
    //pasa primer Parlamentario a página inicial
    $this->parlamentarios = Doctrine::getTable('Parlamentario')
    ->createQuery('p')
    ->limit(1)
    ->execute();

    //echo $this->parlamentarios[0]->getNombre();
    $partidos = $this->parlamentarios[0]->getPartidos();
    $comunas = $this->parlamentarios[0]->getComunas();

    include_partial($content,array('partidos' => $partidos, 'comunas' => $comunas, 'debates' => $debates));
  }
  else {
    include_partial($content);
  }
?>

