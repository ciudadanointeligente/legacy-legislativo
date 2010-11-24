<?php use_stylesheet('demopage.css'); ?>

<?php slot('breadbrumb') ?>
  <li class="actual">> Perfiles Partidos Políticos</li>
<?php end_slot() ?>

<h1 class="grafico">Perfiles Partidos Políticos</h1>

<table class="partidos">
  <thead>
    <tr class="titulos">
      <th></th>
      <th>Nombre</th>
      <th>Sigla</th>
      <th>Nº diputados</th>
      <th>Nº senadores</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($partidos as $partido): ?>
    <tr>
      <td class="imgcell"><a href="<?php echo url_for('Partido/show?id_partido='.$partido->getIdPartido()) ?>"><img src="/images/partidos/<?php echo $partido->getIdPartido() ?>_30.png"></a></td>
      <td class="nombre"><a href="<?php echo url_for('Partido/show?id_partido='.$partido->getIdPartido()) ?>"><?php echo $partido->getNombre() ?></a></td>
      <td><?php echo $partido->getSigla() ?></td>
      <td><?php echo $partido->getNroDiputados_2010() ?></td>
      <td><?php echo $partido->getNroSenadores_2010() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

