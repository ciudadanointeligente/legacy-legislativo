<td class="sf_admin_text sf_admin_list_td_name">
  <?php echo link_to($votacion->getName(), 'votacion_edit', $votacion) ?>
</td>
<td class="sf_admin_date sf_admin_list_td_fecha">
  <?php echo false !== strtotime($votacion->getFecha()) ? format_date($votacion->getFecha(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_text sf_admin_list_td_camara">
  <?php echo $votacion->getCamara() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_tipo">
  <?php echo $votacion->getTipo() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_articulo">
  <?php echo $votacion->getArticulo() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_materia">
  <?php echo $votacion->getMateria() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_resultado">
  <?php echo $votacion->getResultado() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_id_parlamento">
  <?php echo $votacion->getIdParlamento() ?>
</td>
