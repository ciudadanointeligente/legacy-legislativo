<?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_nombre">
  <?php if ('nombre' == $sort[0]): ?>
    <?php echo link_to(__('Nombre', array(), 'messages'), '@parlamentario_Parlamentario', array('query_string' => 'sort=nombre&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Nombre', array(), 'messages'), '@parlamentario_Parlamentario', array('query_string' => 'sort=nombre&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_apellidos">
  <?php if ('apellidos' == $sort[0]): ?>
    <?php echo link_to(__('Apellidos', array(), 'messages'), '@parlamentario_Parlamentario', array('query_string' => 'sort=apellidos&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Apellidos', array(), 'messages'), '@parlamentario_Parlamentario', array('query_string' => 'sort=apellidos&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_senador_diputado">
  <?php if ('senador_diputado' == $sort[0]): ?>
    <?php echo link_to(__('Senador diputado', array(), 'messages'), '@parlamentario_Parlamentario', array('query_string' => 'sort=senador_diputado&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Senador diputado', array(), 'messages'), '@parlamentario_Parlamentario', array('query_string' => 'sort=senador_diputado&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_foreignkey sf_admin_list_th_id_circunscripcion">
  <?php if ('id_circunscripcion' == $sort[0]): ?>
    <?php echo link_to(__('Id circunscripcion', array(), 'messages'), '@parlamentario_Parlamentario', array('query_string' => 'sort=id_circunscripcion&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Id circunscripcion', array(), 'messages'), '@parlamentario_Parlamentario', array('query_string' => 'sort=id_circunscripcion&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_foreignkey sf_admin_list_th_id_distrito">
  <?php if ('id_distrito' == $sort[0]): ?>
    <?php echo link_to(__('Id distrito', array(), 'messages'), '@parlamentario_Parlamentario', array('query_string' => 'sort=id_distrito&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Id distrito', array(), 'messages'), '@parlamentario_Parlamentario', array('query_string' => 'sort=id_distrito&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_pacto">
  <?php if ('pacto' == $sort[0]): ?>
    <?php echo link_to(__('Pacto', array(), 'messages'), '@parlamentario_Parlamentario', array('query_string' => 'sort=pacto&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Pacto', array(), 'messages'), '@parlamentario_Parlamentario', array('query_string' => 'sort=pacto&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_partido">
  <?php echo __('Partido', array(), 'messages') ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?>