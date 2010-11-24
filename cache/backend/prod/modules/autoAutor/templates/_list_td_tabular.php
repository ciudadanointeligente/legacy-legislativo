<td class="sf_admin_text sf_admin_list_td_nombre">
  <?php echo link_to($autor->getNombre(), 'autor_edit', $autor) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_apellidos">
  <?php echo link_to($autor->getApellidos(), 'autor_edit', $autor) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_cargo">
  <?php echo $autor->getCargo() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_periodos">
  <?php echo $autor->getPeriodos() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_parlamentario">
  <?php echo $autor->getParlamentario() ?>
</td>
