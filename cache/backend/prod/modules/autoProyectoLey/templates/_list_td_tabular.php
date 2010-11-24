<td class="sf_admin_text sf_admin_list_td_nro_boletin">
  <?php echo link_to($proyecto_ley->getNroBoletin(), 'proyecto_ley_edit', $proyecto_ley) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_titulo">
  <?php echo $proyecto_ley->getTitulo() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_fecha_ingreso">
  <?php echo false !== strtotime($proyecto_ley->getFechaIngreso()) ? format_date($proyecto_ley->getFechaIngreso(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_text sf_admin_list_td_iniciativa">
  <?php echo $proyecto_ley->getIniciativa() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_etapa">
  <?php echo $proyecto_ley->getEtapa() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_sub_etapa">
  <?php echo $proyecto_ley->getSubEtapa() ?>
</td>
