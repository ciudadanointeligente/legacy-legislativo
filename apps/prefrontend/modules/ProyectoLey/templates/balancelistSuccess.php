<?php
  use_stylesheet('demopage.css');
?>

<table class="th_proyecto">
  <tbody>
    <tr class="titulos">
      <td class="iconoproyectos">&nbsp;</td>
      <td class="fechaingreso"><?php echo ($var1 == 'Ingresados') ? 'Fecha Ingreso' : 'Fecha publicación'; ?></td>
      <td class="nroboletin">Nro boletín</td>
      <td class="tituloley">Título</td>
      <td class="etapa">Etapa</td>
    </tr>
  </tbody>
</table>

<div id="ls_proyectos">
  <table id="tb_proyectos">
    <tbody>
      <?php foreach ($pager->getResults() as $i => $proyecto_ley): ?>
      
      <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd'; ?>">
        <td class="iconoproyectos"><a href="<?php echo url_for('ProyectoLey/show?id_proyecto_ley='.$proyecto_ley->getIdProyectoLey()); ?>"><img src="/images/ley.png"/></a></td>
        <td class="fechaingreso"><?php echo ($var1 == 'Ingresados') ? $proyecto_ley->getDateTimeObject('fecha_ingreso')->format('d/m/Y') : $proyecto_ley->getDateTimeObject('fecha_publicacion')->format('d/m/Y'); ?></td>
        <td class="nroboletin"><?php echo $proyecto_ley->getNroBoletin() ?></td>   
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
    <a href="<?php echo url_for('ProyectoLey/balance') ?>?page=1">
      <img src="/images/first.png" alt="First page" />
    </a>
 
    <a href="<?php echo url_for('ProyectoLey/balance') ?>?page=<?php echo $pager->getPreviousPage() ?>">
      <img src="/images/previous.png" alt="Previous page" title="Previous page" />
    </a>
 
    <?php foreach ($pager->getLinks() as $page): ?>
      <?php if ($page == $pager->getPage()): ?>
        <?php echo $page ?>
      <?php else: ?>
        <a href="<?php echo url_for('ProyectoLey/balance') ?>?page=<?php echo $page ?>"><?php echo $page ?></a>
      <?php endif; ?>
    <?php endforeach; ?>

    <a href="<?php echo url_for('ProyectoLey/balance') ?>?page=<?php echo $pager->getNextPage() ?>">
      <img src="/images/next.png" alt="Next page" title="Next page" />
    </a>
 
    <a href="<?php echo url_for('ProyectoLey/balance') ?>?page=<?php echo $pager->getLastPage() ?>">
      <img src="/images/last.png" alt="Last page" title="Last page" />
    </a>
  </div>
<?php endif; ?>

<div class="pagination_desc">
  <strong><?php echo count($pager)."</strong> proyectos" ?>
 
  <?php if ($pager->haveToPaginate()): ?>
    - página <strong><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong>
  <?php endif; ?>
</div>

