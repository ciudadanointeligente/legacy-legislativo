<td colspan="3">
  <?php echo __('%%nro%% - %%fecha%% - %%camara%%', array('%%nro%%' => $sesion->getNro(), '%%fecha%%' => link_to(false !== strtotime($sesion->getFecha()) ? format_date($sesion->getFecha(), "f") : '&nbsp;', 'sesion_edit', $sesion), '%%camara%%' => $sesion->getCamara()), 'messages') ?>
</td>
