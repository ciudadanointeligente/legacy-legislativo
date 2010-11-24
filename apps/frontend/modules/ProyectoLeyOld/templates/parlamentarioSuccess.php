<?php 
  use_stylesheet('demopage.css');

  $uri = $_SERVER['REQUEST_URI'];
  $pos = strpos($uri,'/ProyectoLey/')+13;
  $pos2 = strpos($uri,'?page=');
  if ($pos2 == false) $vars = explode("/",substr($uri,$pos));
  else $vars = explode("/",substr($uri,$pos,$pos2-$pos));
  
  $etapa = $vars[0];
  $start = $vars[1];
  $end = $vars[2];
  $materia = $vars[3];
  $id_parl = $vars[4];
  $act = $vars[5];
  //echo '<br>'.$etapa.':'.$start.':'.$end.':'.$materia.':'.$id_parl.':'.$act.'<br>';

  echo "<a href=".url_for('ProyectoLey/parlamentario?etapa=4&start='.$start.'&end='.$end.'&materia='.$materia.'&id='.$id_parl.'&act='.$act).">Retirados</a> | ";
  echo "<a href=".url_for('ProyectoLey/parlamentario?etapa=1&start='.$start.'&end='.$end.'&materia='.$materia.'&id='.$id_parl.'&act='.$act).">Publicados</a> | ";
  echo "<a href=".url_for('ProyectoLey/parlamentario?etapa=5&start='.$start.'&end='.$end.'&materia='.$materia.'&id='.$id_parl.'&act='.$act).">Archivados</a> | ";
  echo "<a href=".url_for('ProyectoLey/parlamentario?etapa=3&start='.$start.'&end='.$end.'&materia='.$materia.'&id='.$id_parl.'&act='.$act).">En Tramitación</a> | ";
  echo "<a href=".url_for('ProyectoLey/parlamentario?etapa=2&start='.$start.'&end='.$end.'&materia='.$materia.'&id='.$id_parl.'&act='.$act).">Rechazados</a> | ";
  echo "<a href=".url_for('ProyectoLey/parlamentario?etapa=0&start='.$start.'&end='.$end.'&materia='.$materia.'&id='.$id_parl.'&act='.$act).">Todos</a>";
  
  $estados = array("Publicado", "Rechazado", "de Tramitación", "Retirado", "Archivado");
?>

<?php
  $this_proyecto = $pager->getResults();
  $this_proyecto = $this_proyecto[0];
  $count = $this_proyecto->countProyectos($start,$end,$etapa);
  if ($count == 0) $this_proyecto = null;
?>

<?php slot('breadbrumb') ?>
  <li>> <a href="<?php echo url_for('Parlamentario/index') ?>">Perfiles Parlamentarios</a></li>
  <li>> <a href="<?php echo url_for('Parlamentario/show?id_parlamentario='.$id_parl) ?>"><?php echo $parlamentario ?></a></li>
  <li class="actual">> Mociones presentadas</li>
<?php end_slot() ?>

<h1 class="grafico">Mociones presentadas en el período <?php echo $start.'-'.$end; if ($etapa != 0) echo ' en estado <em>'.$estados[$etapa-1]; echo '</em> por '.$parlamentario; if ($materia != 0) echo ' (Materia <em>'.$supermateria.'</em>)'; ?></h1>

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
        <!--<td class="id"><a href="<?php echo url_for('ProyectoLey/parlamentario?etapa='.$etapa.'&start='.$start.'&end='.$end.'&materia='.$materia.'&id='.$id_parl.'&act='.$proyecto_ley->getIdProyectoLey()) ?>"><?php echo $id ?></a></td>-->
        <td class="iconoproyectos"><a href="<?php echo url_for('ProyectoLey/parlamentario?etapa='.$etapa.'&start='.$start.'&end='.$end.'&materia='.$materia.'&id='.$id_parl.'&act='.$proyecto_ley->getIdProyectoLey()).'?page='.$pager->getPage(); ?>"><img src="/images/ley.png"/></a></td>
        <td class="fechaingreso"><?php echo $proyecto_ley->getDateTimeObject('fecha_ingreso')->format('d/m/Y'); ?></td>
        <td class="nroboletin"><!--<a href="http://sil.senado.cl/cgi-bin/sil_proyectos.pl?<?php echo $proyecto_ley->getNroBoletin() ?>">--><?php echo $proyecto_ley->getNroBoletin() ?><!--</a>--></td>   
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
    <a href="<?php echo url_for('ProyectoLey/parlamentario?etapa='.$etapa.'&start='.$start.'&end='.$end.'&materia='.$materia.'&id='.$id_parl.'&act='.$act) ?>?page=1">
      <img src="/images/first.png" alt="First page" />
    </a>
 
    <a href="<?php echo url_for('ProyectoLey/parlamentario?etapa='.$etapa.'&start='.$start.'&end='.$end.'&materia='.$materia.'&id='.$id_parl.'&act='.$act) ?>?page=<?php echo $pager->getPreviousPage() ?>">
      <img src="/images/previous.png" alt="Previous page" title="Previous page" />
    </a>
 
    <?php foreach ($pager->getLinks() as $page): ?>
      <?php if ($page == $pager->getPage()): ?>
        <?php echo $page ?>
      <?php else: ?>
        <a href="<?php echo url_for('ProyectoLey/parlamentario?etapa='.$etapa.'&start='.$start.'&end='.$end.'&materia='.$materia.'&id='.$id_parl.'&act='.$act) ?>?page=<?php echo $page ?>"><?php echo $page ?></a>
      <?php endif; ?>
    <?php endforeach; ?>

    <a href="<?php echo url_for('ProyectoLey/parlamentario?etapa='.$etapa.'&start='.$start.'&end='.$end.'&materia='.$materia.'&id='.$id_parl.'&act='.$act) ?>?page=<?php echo $pager->getNextPage() ?>">
      <img src="/images/next.png" alt="Next page" title="Next page" />
    </a>
 
    <a href="<?php echo url_for('ProyectoLey/parlamentario?etapa='.$etapa.'&start='.$start.'&end='.$end.'&materia='.$materia.'&id='.$id_parl.'&act='.$act) ?>?page=<?php echo $pager->getLastPage() ?>">
      <img src="/images/last.png" alt="Last page" title="Last page" />
    </a>
  </div>
<?php endif; ?>

<div class="pagination_desc">
  <strong><?php echo count($pager)."</strong> proyectos en Etapa ".$etapa." (periodo ".$start." - ".$end.")" ?>
 
  <?php if ($pager->haveToPaginate()): ?>
    - página <strong><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong>
  <?php endif; ?>
</div>
<hr />

<!-- partial _detalle para mostrar detalles del proyectoLey -->
<?php include_partial('ProyectoLey/detalle', array('this_proyecto' => $this_proyecto)) ?>

