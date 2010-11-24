<?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_nro_boletin">
  <?php if ('nro_boletin' == $sort[0]): ?>
    <?php echo link_to(__('Nro boletin', array(), 'messages'), '@proyecto_ley', array('query_string' => 'sort=nro_boletin&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Nro boletin', array(), 'messages'), '@proyecto_ley', array('query_string' => 'sort=nro_boletin&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_titulo">
  <?php if ('titulo' == $sort[0]): ?>
    <?php echo link_to(__('Titulo', array(), 'messages'), '@proyecto_ley', array('query_string' => 'sort=titulo&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Titulo', array(), 'messages'), '@proyecto_ley', array('query_string' => 'sort=titulo&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_date sf_admin_list_th_fecha_ingreso">
  <?php if ('fecha_ingreso' == $sort[0]): ?>
    <?php echo link_to(__('Fecha ingreso', array(), 'messages'), '@proyecto_ley', array('query_string' => 'sort=fecha_ingreso&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Fecha ingreso', array(), 'messages'), '@proyecto_ley', array('query_string' => 'sort=fecha_ingreso&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_iniciativa">
  <?php if ('iniciativa' == $sort[0]): ?>
    <?php echo link_to(__('Iniciativa', array(), 'messages'), '@proyecto_ley', array('query_string' => 'sort=iniciativa&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Iniciativa', array(), 'messages'), '@proyecto_ley', array('query_string' => 'sort=iniciativa&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_etapa">
  <?php if ('etapa' == $sort[0]): ?>
    <?php echo link_to(__('Etapa', array(), 'messages'), '@proyecto_ley', array('query_string' => 'sort=etapa&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Etapa', array(), 'messages'), '@proyecto_ley', array('query_string' => 'sort=etapa&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_sub_etapa">
  <?php if ('sub_etapa' == $sort[0]): ?>
    <?php echo link_to(__('Sub etapa', array(), 'messages'), '@proyecto_ley', array('query_string' => 'sort=sub_etapa&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Sub etapa', array(), 'messages'), '@proyecto_ley', array('query_string' => 'sort=sub_etapa&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?>