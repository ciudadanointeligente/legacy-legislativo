<?php use_helper('I18N', 'Date') ?>
<?php include_partial('Comision/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Edit Comision', array(), 'messages') ?></h1>

  <?php include_partial('Comision/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('Comision/form_header', array('comision' => $comision, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('Comision/form', array('comision' => $comision, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('Comision/form_footer', array('comision' => $comision, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
