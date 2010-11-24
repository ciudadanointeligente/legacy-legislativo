<?php use_stylesheet('demopage.css'); ?>

<?php slot('breadbrumb') ?>
  <li>> <a href="<?php echo url_for('Sesion/index') ?>">Análisis legislativo</a></li>
  <li class="actual">> Proyecto en discusión</li>
<?php end_slot() ?>

<!-- partial _detalle para mostrar detalles del proyectoLey -->
<?php include_partial('ProyectoLey/detalle', array('this_proyecto' => $proyecto_ley)) ?>
