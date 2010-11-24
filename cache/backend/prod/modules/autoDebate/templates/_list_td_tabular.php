<td class="sf_admin_text sf_admin_list_td_proyecto_ley">
  <?php echo link_to($debate->getProyectoLey(), 'debate_edit', $debate) ?>
</td>
<td class="sf_admin_date sf_admin_list_td_fecha">
  <?php echo false !== strtotime($debate->getFecha()) ? format_date($debate->getFecha(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_text sf_admin_list_td_tema">
  <?php echo $debate->getTema() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_camara">
  <?php echo $debate->getCamara() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_comision_sala">
  <?php echo $debate->getComisionSala() ?>
</td>
