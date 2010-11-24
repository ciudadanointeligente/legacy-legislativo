<td colspan="6">
  <?php echo __('%%nro_boletin%% - %%titulo%% - %%fecha_ingreso%% - %%iniciativa%% - %%etapa%% - %%sub_etapa%%', array('%%nro_boletin%%' => link_to($proyecto_ley->getNroBoletin(), 'proyecto_ley_edit', $proyecto_ley), '%%titulo%%' => $proyecto_ley->getTitulo(), '%%fecha_ingreso%%' => false !== strtotime($proyecto_ley->getFechaIngreso()) ? format_date($proyecto_ley->getFechaIngreso(), "f") : '&nbsp;', '%%iniciativa%%' => $proyecto_ley->getIniciativa(), '%%etapa%%' => $proyecto_ley->getEtapa(), '%%sub_etapa%%' => $proyecto_ley->getSubEtapa()), 'messages') ?>
</td>
