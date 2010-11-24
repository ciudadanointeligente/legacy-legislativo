<td colspan="5">
  <?php echo __('%%nombre%% - %%apellidos%% - %%cargo%% - %%periodos%% - %%parlamentario%%', array('%%nombre%%' => link_to($autor->getNombre(), 'autor_edit', $autor), '%%apellidos%%' => link_to($autor->getApellidos(), 'autor_edit', $autor), '%%cargo%%' => $autor->getCargo(), '%%periodos%%' => $autor->getPeriodos(), '%%parlamentario%%' => $autor->getParlamentario()), 'messages') ?>
</td>
