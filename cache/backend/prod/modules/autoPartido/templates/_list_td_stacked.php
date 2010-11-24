<td colspan="2">
  <?php echo __('%%nombre%% - %%sigla%%', array('%%nombre%%' => link_to($partido->getNombre(), 'partido_edit', $partido), '%%sigla%%' => $partido->getSigla()), 'messages') ?>
</td>
