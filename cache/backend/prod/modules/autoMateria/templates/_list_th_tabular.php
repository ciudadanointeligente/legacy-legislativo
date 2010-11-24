<?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_nombre">
  <?php if ('nombre' == $sort[0]): ?>
    <?php echo link_to(__('Nombre', array(), 'messages'), '@materia', array('query_string' => 'sort=nombre&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Nombre', array(), 'messages'), '@materia', array('query_string' => 'sort=nombre&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_super_materia">
  <?php if ('super_materia' == $sort[0]): ?>
    <?php echo link_to(__('Super materia', array(), 'messages'), '@materia', array('query_string' => 'sort=super_materia&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Super materia', array(), 'messages'), '@materia', array('query_string' => 'sort=super_materia&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?>