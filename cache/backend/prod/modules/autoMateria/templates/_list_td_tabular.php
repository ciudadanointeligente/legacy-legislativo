<td class="sf_admin_text sf_admin_list_td_nombre">
  <?php echo link_to($materia->getNombre(), 'materia_edit', $materia) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_super_materia">
  <?php echo $materia->getSuperMateria() ?>
</td>
