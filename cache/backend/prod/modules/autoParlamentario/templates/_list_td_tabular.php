<td class="sf_admin_text sf_admin_list_td_nombre">
  <?php echo link_to($parlamentario->getNombre(), 'parlamentario_Parlamentario_edit', $parlamentario) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_apellidos">
  <?php echo $parlamentario->getApellidos() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_senador_diputado">
  <?php echo $parlamentario->getSenadorDiputado() ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_id_circunscripcion">
  <?php echo $parlamentario->getIdCircunscripcion() ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_id_distrito">
  <?php echo $parlamentario->getIdDistrito() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_pacto">
  <?php echo $parlamentario->getPacto() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_partido">
  <?php echo $parlamentario->getPartido() ?>
</td>
