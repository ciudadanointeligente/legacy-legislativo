<?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_nro">
  <?php if ('nro' == $sort[0]): ?>
    <?php echo link_to(__('Nro', array(), 'messages'), '@sesion', array('query_string' => 'sort=nro&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Nro', array(), 'messages'), '@sesion', array('query_string' => 'sort=nro&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_date sf_admin_list_th_fecha">
  <?php if ('fecha' == $sort[0]): ?>
    <?php echo link_to(__('Fecha', array(), 'messages'), '@sesion', array('query_string' => 'sort=fecha&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Fecha', array(), 'messages'), '@sesion', array('query_string' => 'sort=fecha&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_camara">
  <?php if ('camara' == $sort[0]): ?>
    <?php echo link_to(__('Camara', array(), 'messages'), '@sesion', array('query_string' => 'sort=camara&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Camara', array(), 'messages'), '@sesion', array('query_string' => 'sort=camara&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?>