<td colspan="2">
  <?php echo __('%%nombre%% - %%super_materia%%', array('%%nombre%%' => link_to($materia->getNombre(), 'materia_edit', $materia), '%%super_materia%%' => $materia->getSuperMateria()), 'messages') ?>
</td>
