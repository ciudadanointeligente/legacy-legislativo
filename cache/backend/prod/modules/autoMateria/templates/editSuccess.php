<?php use_helper('I18N', 'Date') ?>
<?php include_partial('Materia/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Edit Materia', array(), 'messages') ?></h1>

  <?php include_partial('Materia/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('Materia/form_header', array('materia' => $materia, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('Materia/form', array('materia' => $materia, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('Materia/form_footer', array('materia' => $materia, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
