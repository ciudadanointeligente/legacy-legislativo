<tr class="tr_proyecto_detalle_sub">
  <td class="tit-ico"></td>
  <td class="tit-m"><h1><?php echo $proyecto->getTitulo() ?></h1></td>
</tr>

<tr><td colspan="4">
  <table width="98%" class="tb_proyecto_detalle2">
    <thead>
      <tr class="titulos2">
        <th>Nro boletín</th>
        <th>Fecha ingreso</th>
        <th>Iniciativa</th>
        <th>Camara origen</th>
        <th>Etapa</th>
        <?php if ($proyecto->getEtapa() == 'Tramitación terminada' && $proyecto->getFechaPublicacion() != 0) : ?>
          <?php if ($proyecto->getLey() != NULL) : ?>
            <th>Nº Ley</th>
          <?php else : ?>
            <th>Nº Decreto</th>
          <?php endif; ?>
          <th>Fecha publicación</th>
        <?php else : ?>
          <th>Subetapa</th>
        <?php endif; ?>
        <th>Materia</th>
      </tr>
    </thead>
    <tbody>
      <tr class="info">
        <td class="nroBoletin"><?php echo $proyecto->getNroBoletin() ?></td>
        <td class="fechaIngreso"><?php if ($proyecto->getFechaIngreso() != null) echo $proyecto->getDateTimeObject('fecha_ingreso')->format('d/m/Y') ?></td>
        <td class="imgcell"><?php if ($proyecto->getIniciativa() != null) if (trim($proyecto->getIniciativa()) == 'Moción') echo '<img class="ico" alt="Moción" title="Moción" src="/images/mocion.png">'; else echo '<img class="ico" alt="Mensaje" title="Mensaje" src="/images/mensaje.png">'; ?></td>
        <td class="camaraOrigen"><?php if ($proyecto->getCamaraOrigen() != null) if (trim($proyecto->getCamaraOrigen()) == 'Senado') echo '<img class="ico" alt="Senado" title="Senado" src="/images/senado.png">'; else echo '<img class="ico" alt="Cámara Diputados" title="Cámara Diputados" src="/images/camara.png">'; ?></td>
        <td class="etapa"><?php echo $proyecto->getEtapa(); if ($proyecto->getEtapa()=='Primer trámite constitucional') echo ' (cámara de origen)'; else if ($proyecto->getEtapa()=='Segundo trámite constitucional') echo ' (cámara revisora)'; ?></td>
        <?php if ($proyecto->getEtapa() == 'Tramitación terminada' && $proyecto->getFechaPublicacion() != 0) : ?>
          <?php if ($proyecto->getLey() != NULL) : ?>
            <td class="ley"><a href="<?php echo $proyecto->getLeyBcn(); ?>" target="_blank"><?php echo $proyecto->getLey(); ?></a></td>
          <?php else : ?>
            <td class="ley"><a href="<?php echo $proyecto->getDecretoBcn(); ?>" target="_blank"><?php echo $proyecto->getDecreto(); ?></a></td>
          <?php endif; ?>
          <td class="fechaPub"><?php echo $proyecto->getDateTimeObject('fecha_publicacion')->format('d/m/Y') ?></td>
        <?php else : ?>
          <td class="subEtapa"><?php echo $proyecto->getSubEtapa(); ?></td>
        <?php endif; ?>
        <td class="materia"><?php echo $proyecto->getMateria() ?></td>
      </tr>
    </tbody>
  </table>
</td></tr>

