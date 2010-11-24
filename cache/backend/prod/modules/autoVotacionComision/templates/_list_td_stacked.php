<td colspan="7">
  <?php echo __('%%proyecto_ley%% - %%comision%% - %%camara%% - %%tipo%% - %%articulo%% - %%resultado%% - %%debate%%', array('%%proyecto_ley%%' => link_to($votacion_comision->getProyectoLey(), 'votacion_comision_edit', $votacion_comision), '%%comision%%' => $votacion_comision->getComision(), '%%camara%%' => $votacion_comision->getCamara(), '%%tipo%%' => $votacion_comision->getTipo(), '%%articulo%%' => $votacion_comision->getArticulo(), '%%resultado%%' => $votacion_comision->getResultado(), '%%debate%%' => $votacion_comision->getDebate()), 'messages') ?>
</td>
