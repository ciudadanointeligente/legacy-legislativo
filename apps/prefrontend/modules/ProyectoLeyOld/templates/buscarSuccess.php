<?php 
  use_stylesheet('demopage.css');
  use_javascript('buscador.js');

  $uri = $_SERVER['REQUEST_URI'];
  $pos = strpos($uri,'/ProyectoLey/')+13;
  $pos2 = strpos($uri,'?page=');
  if ($pos2 == false) $vars = explode("/",substr($uri,$pos));
  else $vars = explode("/",substr($uri,$pos,$pos2-$pos));

  //con variables
  $frase = $vars[2];
  $act = $vars[4];
  //echo '<br>'.$frase.':'.$act.'<br>';
  
  //sin variables
  //$frase = $vars[0];
  //$act = $vars[1];
  //echo '<br>'.$frase.':'.$act.'<br>';

  $frase = str_replace("%20"," ",$frase);
  $this_proyecto = $pager->getResults();
?>

<?php if (count($this_proyecto) > 0): ?>

  <?php $this_proyecto = $this_proyecto[0]; ?>

  <?php slot('breadbrumb') ?>
    <li>> <a href="<?php echo url_for('ProyectoLey/index') ?>">El baúl de los Proyectos</a></li>
    <li class="actual">> Buscador de Proyectos de Ley</li>
  <?php end_slot() ?>

  <h1 class="grafico">Leyes con frase "<?php echo $frase ?>"</h1>

  <!--<div class="buscador"><form name="buscador" method="post" onSubmit="document.buscador.action='/ProyectoLey/buscar/frase/'+document.buscador.filter.value+'/act/0'" ><label for="filter">Buscador de Proyectos de Ley</label><input type="text" name="filter" id="filter" /><input type="submit" value="Buscar"></form></div>-->

  <table class="th_proyecto">
    <tbody>
      <tr class="titulos">
        <td class="iconoproyectos">&nbsp;</td>
        <td class="fechaingreso">Fecha Ingreso</td>
        <td class="nroboletin">Nro boletín</td>
        <td class="tituloley">Título</td>
        <td class="etapa">Etapa</td>
      </tr>
    </tbody>
  </table>

  <div id="ls_proyectos">
    <table id="tb_proyectos">
      <tbody>
        <?php foreach ($pager->getResults() as $i => $proyecto_ley): 
          $id=$proyecto_ley->getIdProyectoLey();
          if ($id == $act) $this_proyecto = $proyecto_ley;
          if ($act == 0) $act = $id;
        ?>
        
        <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd'; if ($id==$act) echo ' destacada' ?>">
          <td class="iconoproyectos"><a href="<?php echo '/ProyectoLey/buscar/frase/'.$frase.'/act/'.$proyecto_ley->getIdProyectoLey().'?page='.$pager->getPage(); ?>"><img src="/images/ley.png"/></a></td>
          <td class="fechaingreso"><?php echo $proyecto_ley->getDateTimeObject('fecha_ingreso')->format('d/m/Y'); ?></td>
          <td class="nroboletin"><a href="<?php echo url_for('ProyectoLey/show?id_proyecto_ley='.$proyecto_ley->getIdProyectoLey()) ?>"><?php echo $proyecto_ley->getNroBoletin() ?></a></td>   
          <td class="tituloley"><?php echo $proyecto_ley->getTitulo() ?></td>
          <td class="etapa"><?php echo $proyecto_ley->getEtapa() ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <hr />
  <?php if ($pager->haveToPaginate()): ?>
    <div class="pagination">
      <a href="<?php echo '/ProyectoLey/buscar/frase/'.$frase.'/act/'.$act ?>?page=1">
        <img src="/images/first.png" alt="First page" />
      </a>
   
      <a href="<?php echo '/ProyectoLey/buscar/frase/'.$frase.'/act/'.$act ?>?page=<?php echo $pager->getPreviousPage() ?>">
        <img src="/images/previous.png" alt="Previous page" title="Previous page" />
      </a>
   
      <?php foreach ($pager->getLinks() as $page): ?>
        <?php if ($page == $pager->getPage()): ?>
          <?php echo $page ?>
        <?php else: ?>
          <a href="<?php echo '/ProyectoLey/buscar/frase/'.$frase.'/act/'.$act ?>?page=<?php echo $page ?>"><?php echo $page ?></a>
        <?php endif; ?>
      <?php endforeach; ?>

      <a href="<?php echo '/ProyectoLey/buscar/frase/'.$frase.'/act/'.$act ?>?page=<?php echo $pager->getNextPage() ?>">
        <img src="/images/next.png" alt="Next page" title="Next page" />
      </a>
   
      <a href="<?php echo '/ProyectoLey/buscar/frase/'.$frase.'/act/'.$act ?>?page=<?php echo $pager->getLastPage() ?>">
        <img src="/images/last.png" alt="Last page" title="Last page" />
      </a>
    </div>
  <?php endif; ?>

  <div class="pagination_desc">
    <strong><?php echo count($pager).'</strong> proyectos que contienen frase "'.$frase.'"' ?>
   
    <?php if ($pager->haveToPaginate()): ?>
      - página <strong><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong>
    <?php endif; ?>
  </div>
  <hr />

  <!-- partial _detalle para mostrar detalles del proyectoLey -->
  <?php include_partial('ProyectoLey/detalle', array('this_proyecto' => $this_proyecto)) ?>

<?php else: ?>

  <h1 class="grafico">No hay leyes que contienen la frase "<?php echo $frase ?>"</h1>

<?php endif; ?>
