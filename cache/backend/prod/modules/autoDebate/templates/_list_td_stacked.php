<td colspan="5">
  <?php echo __('%%proyecto_ley%% - %%fecha%% - %%tema%% - %%camara%% - %%comision_sala%%', array('%%proyecto_ley%%' => link_to($debate->getProyectoLey(), 'debate_edit', $debate), '%%fecha%%' => false !== strtotime($debate->getFecha()) ? format_date($debate->getFecha(), "f") : '&nbsp;', '%%tema%%' => $debate->getTema(), '%%camara%%' => $debate->getCamara(), '%%comision_sala%%' => $debate->getComisionSala()), 'messages') ?>
</td>
