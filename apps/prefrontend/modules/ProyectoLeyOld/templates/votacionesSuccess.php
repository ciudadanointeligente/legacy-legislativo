<?php 
  use_stylesheet('demopage.css');
  use_stylesheet('votacion.css');
  use_stylesheet('visualize.css');
  use_stylesheet('visualize-light-votacion.css');
  use_javascript('jquery.min.js');
	use_javascript('visualize2.jQuery.js');
  use_stylesheet('bubbletip.css');
  use_javascript('ui/jbubbletip.js');
?>

<!--[if IE 7]><?php use_stylesheet('bubbletip-IE.css') ?><![endif]-->

<?php slot('breadbrumb') ?>
  <li>> <a href="<?php echo url_for('Sesion/index') ?>">Análisis legislativo</a></li>
  <li>> <a href="<?php echo url_for('ProyectoLey/show?id_proyecto_ley='.$proyecto_ley->getIdProyectoLey()) ?>">Proyecto en discusión</a></li>
  <li class="actual">> Votaciones</li>
<?php end_slot() ?>

<table class="tb_proyecto_detalle">
  <tbody>
    <?php include_partial('ProyectoLey/cabecera', array('proyecto' => $proyecto_ley)) ?>
  </tbody>
</table>

<table id="tb_votaciones">
  <?php foreach ($proyecto_ley->getVotacion() as $i=>$votacion): ?>
    <?php if ($votacion->getVisible()): ?>
      <tr class="tb_votaciones_header">
        <td class="voto_sala"><?php echo ($i==0) ? '<a name="sala">SALA</a>' : 'SALA' ?></td>
        <td class="voto_fecha"><?php echo $votacion->getDateTimeObject('fecha')->format('d/m/Y'); ?></td>
      </tr>
      <tr class="tb_votaciones_row">
        <td><?php include_partial('ProyectoLey/tabvotacion', array('votacion' => $votacion)) ?></td>
        <td><?php include_partial('ProyectoLey/votacion2', array('votacion' => $votacion, 'nota' => $votacion->getNota())) ?>
          <div class="tb_votacion_botones">
            <a href="http://www.camara.cl/trabajamos/sala_votacion_detalle.aspx?prmId=<?php echo $votacion->getIdParlamento() ?>" target="_blank" id="fuente_btn_<?php echo $votacion->getIdVotacion() ?>"><img src="/images/proyectoley/fuente.png" align="right" /><div id="tip_fuente_<?php echo $votacion->getIdVotacion() ?>" style="display:none;">Gráficos: Elaboración Vota Inteligente. Fuente: www.congreso.cl</div></a>
          </div>
          
          <script type="text/javascript">
            //tooltips
            $('#fuente_btn_<?php echo $votacion->getIdVotacion() ?>').bubbletip($('#tip_fuente_<?php echo $votacion->getIdVotacion() ?>'), {
              deltaDirection: 'left',
              offsetTop: 0,
              offsetRight: 50
            });
          </script>
        </td>
      </tr>
      <tr class="tb_votaciones_empty"></tr>
    <?php endif; ?>
  <?php endforeach; ?>

  <?php foreach ($proyecto_ley->getVotacionComision() as $i=>$votacion): ?>
    <tr class="tb_votaciones_header">
      <td class="voto_comision"><?php echo ($i==0) ? '<a name="comision">COMISIÓN</a>' : 'COMISIÓN' ?></td>
      <td class="voto_fecha"><?php echo $votacion->getDebate()->getDateTimeObject('fecha')->format('d/m/Y'); ?></td>
    </tr>
    <tr class="tb_votaciones_row">
      <td><?php include_partial('ProyectoLey/tabvotacion_comision', array('votacion' => $votacion)) ?></td>
      <td><?php include_partial('ProyectoLey/votacion2_comision', array('votacion' => $votacion)) ?>
      </td>
    </tr>
    <tr class="tb_votaciones_empty"></tr>
  <?php endforeach; ?>
</table>
