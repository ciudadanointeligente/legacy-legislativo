<td class="sf_admin_text sf_admin_list_td_proyecto_ley">
  <?php echo link_to($votacion_comision->getProyectoLey(), 'votacion_comision_edit', $votacion_comision) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_comision">
  <?php echo $votacion_comision->getComision() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_camara">
  <?php echo $votacion_comision->getCamara() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_tipo">
  <?php echo $votacion_comision->getTipo() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_articulo">
  <?php echo $votacion_comision->getArticulo() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_resultado">
  <?php echo $votacion_comision->getResultado() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_debate">
  <?php echo $votacion_comision->getDebate() ?>
</td>
