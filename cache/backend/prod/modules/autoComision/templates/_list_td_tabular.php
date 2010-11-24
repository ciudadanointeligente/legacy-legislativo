<td class="sf_admin_text sf_admin_list_td_nombre">
  <?php echo link_to($comision->getNombre(), 'comision_edit', $comision) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_camara">
  <?php echo $comision->getCamara() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_tipo">
  <?php echo $comision->getTipo() ?>
</td>
