<?php use_helper('I18N', 'Date') ?>
<?php include_partial('Partido/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('New Partido', array(), 'messages') ?></h1>

  <?php include_partial('Partido/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('Partido/form_header', array('partido' => $partido, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('Partido/form', array('partido' => $partido, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('Partido/form_footer', array('partido' => $partido, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
