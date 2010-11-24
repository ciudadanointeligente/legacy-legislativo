<?php use_helper('I18N', 'Date') ?>
<?php include_partial('Parlamentario/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Edit Parlamentario', array(), 'messages') ?></h1>

  <?php include_partial('Parlamentario/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('Parlamentario/form_header', array('parlamentario' => $parlamentario, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('Parlamentario/form', array('parlamentario' => $parlamentario, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('Parlamentario/form_footer', array('parlamentario' => $parlamentario, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
