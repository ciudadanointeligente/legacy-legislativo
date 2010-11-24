<td colspan="3">
  <?php echo __('%%nombre%% - %%camara%% - %%tipo%%', array('%%nombre%%' => link_to($comision->getNombre(), 'comision_edit', $comision), '%%camara%%' => $comision->getCamara(), '%%tipo%%' => $comision->getTipo()), 'messages') ?>
</td>
