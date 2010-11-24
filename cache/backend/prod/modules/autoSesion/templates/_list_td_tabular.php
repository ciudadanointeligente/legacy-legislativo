<td class="sf_admin_text sf_admin_list_td_nro">
  <?php echo $sesion->getNro() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_fecha">
  <?php echo link_to(false !== strtotime($sesion->getFecha()) ? format_date($sesion->getFecha(), "f") : '&nbsp;', 'sesion_edit', $sesion) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_camara">
  <?php echo $sesion->getCamara() ?>
</td>
